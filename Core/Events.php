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
namespace ProudCommerce\Bla\StaticBrutto\Core;


use OxidEsales\Eshop\Application\Model\CountryList;
use OxidEsales\Eshop\Core\Base;
use OxidEsales\Eshop\Core\Registry;

class Events extends Base
{
    /**
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     */
    public static function setup()
    {
        $cfg = Registry::getConfig();
        $var = $cfg->getConfigParam("aaBlaFullVat");
        if( empty($var) )
        {
            $dDefaultVat = doubleval($cfg->getConfigParam( 'dDefaultVAT' ));

            // initial setup
            /** @var CountryList $aCountries */
            $aCountries = oxNew(CountryList::class);
            $aCountries->loadActiveCountries();

            $aaBlaFullVat = array();
            $aaBlaReducedVat = array();

            foreach($aCountries as $oCountry)
            {
                $aaBlaFullVat[$oCountry->oxcountry__oxid->value]  = $dDefaultVat;
                $aaBlaReducedVat[$oCountry->oxcountry__oxid->value] = $dDefaultVat;
            }

            $cfg->saveShopConfVar("aarr", "aaBlaFullVat",  $aaBlaFullVat,  null, "module:bla-staticbrutto");
            $cfg->saveShopConfVar("aarr", "aaBlaReducedVat", $aaBlaReducedVat, null, "module:bla-staticbrutto");
        }
    }
}