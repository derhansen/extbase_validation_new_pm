<?php
namespace Derhansen\ValidationExamplesNew\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Torben Hansen <derhansen@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Multiple Steps Controller
 *
 * @package validation_examples_new
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class MultipleStepsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * addressdataRepository
	 *
	 * @var \Derhansen\ValidationExamplesNew\Domain\Repository\AddressdataRepository
	 * @inject
	 */
	protected $addressdataRepository;

	/**
	 * API Service
	 *
	 * @var \Derhansen\ValidationExamplesNew\Service\ExternalApiService
	 * @inject
	 */
	protected $apiService;

	/**
	 * Step1
	 *
	 * @param \Derhansen\ValidationExamplesNew\Domain\Model\Step1Data $step1data
	 * @ignorevalidation $step1data
	 */
	public function step1Action(\Derhansen\ValidationExamplesNew\Domain\Model\Step1Data $step1data = NULL) {
		/* Check if step1data is available in session */
		if ($GLOBALS['TSFE']->fe_user->getKey('ses', 'step1data') && $step1data == NULL) {
			$step1data = unserialize($GLOBALS['TSFE']->fe_user->getKey('ses', 'step1data'));
		}

		$this->view->assign('step1data', $step1data);
	}

	/**
	 * Step1 redirect action
	 *
	 * @param \Derhansen\ValidationExamplesNew\Domain\Model\Step1Data $step1data
	 */
	public function step1redirectAction(\Derhansen\ValidationExamplesNew\Domain\Model\Step1Data $step1data) {
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'step1data', serialize($step1data));
		$GLOBALS['TSFE']->fe_user->storeSessionData();

		$this->redirect('step2');
	}

	/**
	 * Step2
	 *
	 * @param \Derhansen\ValidationExamplesNew\Domain\Model\Step2Data $step2data
	 * @ignorevalidation $step2data
	 */
	public function step2Action(\Derhansen\ValidationExamplesNew\Domain\Model\Step2Data $step2data = NULL) {
		/* Check if step2data is available in session */
		if ($GLOBALS['TSFE']->fe_user->getKey('ses', 'step2data') && $step2data == NULL) {
			$step2data = unserialize($GLOBALS['TSFE']->fe_user->getKey('ses', 'step2data'));
		}

		/* Set external validations errors if available */
		$this->setApiValidationErrors('step2');

		$this->view->assign('step2data', $step2data);
	}

	/**
	 * Step2 redirect action
	 *
	 * @param \Derhansen\ValidationExamplesNew\Domain\Model\Step2Data $step2data
	 */
	public function step2redirectAction(\Derhansen\ValidationExamplesNew\Domain\Model\Step2Data $step2data) {
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'step2data', serialize($step2data));
		$GLOBALS['TSFE']->fe_user->storeSessionData();

		$this->redirect('step3');
	}


	/**
	 * Step3
	 *
	 * @param \Derhansen\ValidationExamplesNew\Domain\Model\Step3Data $step3data
	 * @ignorevalidation $step3data
	 */
	public function step3Action(\Derhansen\ValidationExamplesNew\Domain\Model\Step3Data $step3data = NULL) {
		/* Check if step3data is available in session */
		if ($GLOBALS['TSFE']->fe_user->getKey('ses', 'step3data') && $step3data == NULL) {
			$step3data = unserialize($GLOBALS['TSFE']->fe_user->getKey('ses', 'step3data'));
		}

		/* Set external validations errors if available */
		$this->setApiValidationErrors('step3');

		$this->view->assign('step3data', $step3data);
	}

	/**
	 * Step3 redirect action
	 *
	 * @param \Derhansen\ValidationExamplesNew\Domain\Model\Step3Data $step3data
	 */
	public function step3redirectAction(\Derhansen\ValidationExamplesNew\Domain\Model\Step3Data $step3data) {
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'step3data', serialize($step3data));
		$GLOBALS['TSFE']->fe_user->storeSessionData();

		$this->redirect('create');
	}

	/**
	 * Create Action
	 *
	 * @return void
	 */
	public function createAction() {
		$addressdata = $this->getAddressdataFromSession();

		/* get validation results from API */
		$apiresults = $this->apiService->validateMultipleSteps($addressdata);
		if (count($apiresults) > 0) {
			/* Save results to a session variable */
			$GLOBALS['TSFE']->fe_user->setKey('ses', 'apiresults', $apiresults);
			$GLOBALS['TSFE']->fe_user->storeSessionData();

			/* Redirect to step with validation errors */
			if (array_key_exists('step2', $apiresults)) {
				$this->redirect('step2');
			}
			if (array_key_exists('step3', $apiresults)) {
				$this->redirect('step3');
			}
		}

		$this->addressdataRepository->add($addressdata);
		$this->cleanUpSessionData();

		$this->view->assign('message', 'Addressdata has been created');
	}

	/**
	 * Collects the addressdata from the multiple steps form stored in session variables
	 * and returns an addressdata object.
	 *
	 * @return \Derhansen\ValidationExamplesNew\Domain\Model\Addressdata
	 */
	protected function getAddressdataFromSession() {
		/** @var \Derhansen\ValidationExamplesNew\Domain\Model\Step1Data $step1data */
		$step1data = unserialize($GLOBALS['TSFE']->fe_user->getKey('ses', 'step1data'));

		/** @var \Derhansen\ValidationExamplesNew\Domain\Model\Step2Data $step2data */
		$step2data = unserialize($GLOBALS['TSFE']->fe_user->getKey('ses', 'step2data'));

		/** @var \Derhansen\ValidationExamplesNew\Domain\Model\Step3Data $step3data */
		$step3data = unserialize($GLOBALS['TSFE']->fe_user->getKey('ses', 'step3data'));

		/** @var \Derhansen\ValidationExamplesNew\Domain\Model\Addressdata $addressData */
		$addressData = $this->objectManager->get('Derhansen\ValidationExamplesNew\Domain\Model\Addressdata');
		$addressData->setFirstname($step1data->getFirstname());
		$addressData->setLastname($step1data->getLastname());
		$addressData->setStreet($step2data->getStreet());
		$addressData->setStreetnr($step2data->getStreetnr());
		$addressData->setZip($step3data->getZip());
		$addressData->setCity($step3data->getCity());

		return $addressData;
	}

	/**
	 * Removes all session variables from the multiple steps form
	 *
	 * @return void
	 */
	protected function cleanUpSessionData() {
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'step1data', '');
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'step2data', '');
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'step3data', '');
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'apiresults', '');
		$GLOBALS['TSFE']->fe_user->storeSessionData();
	}

	/**
	 * Sets validation errors for fields in the given step
	 *
	 * @param string $step The step
	 * @return void
	 */
	protected function setApiValidationErrors($step) {
		$apiresults = $GLOBALS['TSFE']->fe_user->getKey('ses', 'apiresults');
		if (is_array($apiresults) && array_key_exists($step, $apiresults)) {
			/* Set Form Errors manually  - get results from property mapper and add new errors */
			$result = $this->getControllerContext()->getRequest()->getOriginalRequestMappingResults();

			/* Add validation errors */
			foreach ($apiresults[$step] as $key => $value) {
				$error = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Validation\Error',
					$apiresults[$step][$key], time());
				$result->forProperty($step . 'data.' . $key)->addError($error);
			}
			$this->getControllerContext()->getRequest()->setOriginalRequestMappingResults($result);
		}
	}

}
?>