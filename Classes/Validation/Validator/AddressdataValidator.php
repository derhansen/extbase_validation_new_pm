<?php
namespace Derhansen\ValidationExamplesNew\Validation\Validator;

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
 * Addressdata validator
 *
 * @package validation_examples_new
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class AddressdataValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {

	/**
	 * API Service
	 *
	 * @var \Derhansen\ValidationExamplesNew\Service\ExternalApiService
	 */
	protected $apiService;

	/**
	 * Injects the API Service
	 *
	 * @param \Derhansen\ValidationExamplesNew\Service\ExternalApiService $apiService
	 * @return void
	 */
	public function injectApiService(\Derhansen\ValidationExamplesNew\Service\ExternalApiService $apiService) {
		$this->apiService = $apiService;
	}

	/**
	 * Object Manager
	 *
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * Injects the object manager
	 *
	 * @param \TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager
	 * @return void
	 */
	public function injectObjectManager(\TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager) {
		$this->objectManager = $objectManager;
	}

	/**
	 * Validates the given value
	 *
	 * @param mixed $value
	 * @return bool
	 */
	protected function isValid($value) {
		$apiValidationResult = $this->apiService->validateAddressData($value);
		$success = TRUE;
		if ($apiValidationResult['zip']) {
			$error = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Validation\\Error',
				$apiValidationResult['zip'], time());
			$this->result->forProperty('zip')->addError($error);
			$success = FALSE;
		}
		if ($apiValidationResult['city']) {
			$error = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Validation\\Error',
				$apiValidationResult['city'], time());
			$this->result->forProperty('city')->addError($error);
			$success = FALSE;
		}
		return $success;
	}
}
?>