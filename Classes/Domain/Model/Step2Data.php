<?php
namespace Derhansen\ValidationExamplesNew\Domain\Model;

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
 * Step2 Data
 *
 * @package validation_examples_new
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Step2Data extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Street
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $street;

	/**
	 * Streetnumber
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $streetnr;

	/**
	 * Returns the street
	 *
	 * @return string $street
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * Sets the street
	 *
	 * @param string $street
	 * @return void
	 */
	public function setStreet($street) {
		$this->street = $street;
	}

	/**
	 * Returns the streetnr
	 *
	 * @return string $streetnr
	 */
	public function getStreetnr() {
		return $this->streetnr;
	}

	/**
	 * Sets the streetnr
	 *
	 * @param string $streetnr
	 * @return void
	 */
	public function setStreetnr($streetnr) {
		$this->streetnr = $streetnr;
	}

}
?>