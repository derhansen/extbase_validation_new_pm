<?php
namespace derhansen\ValidationExamplesNew\Domain\Model;

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
 * Step1 Data
 *
 * @package validation_examples_new
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Step1Data extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Firstname
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $firstname;

	/**
	 * Lastname
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $lastname;

	/**
	 * Returns the firstname
	 *
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Sets the firstname
	 *
	 * @param string $firstname
	 * @return void
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * Returns the lastname
	 *
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Sets the lastname
	 *
	 * @param string $lastname
	 * @return void
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

}
?>