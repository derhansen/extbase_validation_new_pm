<?php
namespace derhansen\ValidationExamplesNew\Controller;

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
 * Single Step Controller
 *
 * @package validation_examples_new
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class AddressdataController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * addressdataRepository
	 *
	 * @var \derhansen\ValidationExamplesNew\Domain\Repository\AddressdataRepository
	 * @inject
	 */
	protected $addressdataRepository;

	/**
	 * action new
	 *
	 * @param \derhansen\ValidationExamplesNew\Domain\Model\Addressdata $newAddressdata
	 * @dontvalidate $newAddressdata
	 * @return void
	 */
	public function newAction(\derhansen\ValidationExamplesNew\Domain\Model\Addressdata $newAddressdata = NULL) {
		$this->view->assign('newAddressdata', $newAddressdata);
	}

	/**
	 * action create
	 *
	 * @param \derhansen\ValidationExamplesNew\Domain\Model\Addressdata $newAddressdata
	 * @validate $newAddressdata \derhansen\ValidationExamplesNew\Validation\Validator\AddressdataValidator
	 * @return void
	 */
	public function createAction(\derhansen\ValidationExamplesNew\Domain\Model\Addressdata $newAddressdata) {
		$this->addressdataRepository->add($newAddressdata);
		$this->view->assign('message', 'Your new Addressdata was created.');
	}

}
?>