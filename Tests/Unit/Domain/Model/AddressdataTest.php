<?php

namespace Derhansen\ValidationExamplesNew\Tests;
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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \Derhansen\ValidationExamplesNew\Domain\Model\Addressdata.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Validation examples (new property mapper)
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class AddressdataTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \Derhansen\ValidationExamplesNew\Domain\Model\Addressdata
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \Derhansen\ValidationExamplesNew\Domain\Model\Addressdata();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getFirstnameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFirstnameForStringSetsFirstname() { 
		$this->fixture->setFirstname('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFirstname()
		);
	}
	
	/**
	 * @test
	 */
	public function getLastnameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLastnameForStringSetsLastname() { 
		$this->fixture->setLastname('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLastname()
		);
	}
	
	/**
	 * @test
	 */
	public function getStreetReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setStreetForStringSetsStreet() { 
		$this->fixture->setStreet('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getStreet()
		);
	}
	
	/**
	 * @test
	 */
	public function getStreetnrReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setStreetnrForStringSetsStreetnr() { 
		$this->fixture->setStreetnr('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getStreetnr()
		);
	}
	
	/**
	 * @test
	 */
	public function getZipReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getZip()
		);
	}

	/**
	 * @test
	 */
	public function setZipForIntegerSetsZip() { 
		$this->fixture->setZip(12);

		$this->assertSame(
			12,
			$this->fixture->getZip()
		);
	}
	
	/**
	 * @test
	 */
	public function getCityReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCityForStringSetsCity() { 
		$this->fixture->setCity('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCity()
		);
	}
	
}
?>