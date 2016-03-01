<?php

/**
 *	bestlife AG - static brutto price no matter of VAT
 *  Copyright (C) 2016  bestlife AG
 *  info:  oxid@bestlife.ag
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 **/

class bla_vat extends oxAdminDetails
{
	public function render()
	{
		parent::render();
		$cfg = oxRegistry::getConfig();

		$aCountries = oxNew("oxcountrylist");
		$aCountries->loadActiveCountries();
		$this->_aViewData["countries"] = $aCountries;

		$aaBlaFullVat = $aaBlaReducedVat = array(); // init and load arrays
		$aaBlaFullVat = $cfg->getConfigParam("aaBlaFullVat");
		$this->_aViewData["aaBlaFullVat"] = $aaBlaFullVat;
		$aaBlaReducedVat = $cfg->getConfigParam("aaBlaReducedVat");
		$this->_aViewData["aaBlaReducedVat"] = $aaBlaReducedVat;

		return "bla_vat.tpl";
	}


	public function save_vats()
	{
		$cfg = oxRegistry::getConfig();

		// first vat rates
		$aaBlaFullVat = $cfg->getRequestParameter("aaBlaFullVat");
		$cfg->saveShopConfVar("aarr", "aaBlaFullVat", $aaBlaFullVat, null,"module:bla-staticbrutto");

		// second vat rates
		$aaBlaReducedVat = $cfg->getRequestParameter("aaBlaReducedVat");
		$cfg->saveShopConfVar("aarr", "aaBlaReducedVat", $aaBlaReducedVat, null, "module:bla-staticbrutto");
		
		$this->_aViewData["msg"] = "gespeichert!";
	}
}
