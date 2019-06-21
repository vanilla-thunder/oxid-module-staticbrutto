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

class oxvatselector_vat extends oxvatselector_vat_parent
{

    public function getArticleVat(oxArticle $oArticle)
    {
        /*
        startProfile("_assignPriceInternal");
        // article has its own VAT ?

        if ( ( $dArticleVat = $oArticle->getCustomVAT() ) !== null )
        {
            stopProfile("_assignPriceInternal");
            return $dArticleVat;
        }
        if ( ( $dArticleVat = $this->_getVatForArticleCategory($oArticle) ) !== false )
        {
            stopProfile("_assignPriceInternal");
            return $dArticleVat;
        }

        stopProfile("_assignPriceInternal");
        return $this->getConfig()->getConfigParam( 'dDefaultVAT' );
        */

        $ret = parent::getArticleVat($oArticle);
        $cfg = oxRegistry::getConfig();

        if ($oUser = oxRegistry::getSession()->getBasket()->getBasketUser())
        {
            // got default vat?
            if ($ret > 0) {
                $aVatRates   = ($ret == $cfg->getConfigParam('dDefaultVAT')) ? oxRegistry::getConfig()->getConfigParam("aaBlaFullVat") : oxRegistry::getConfig()->getConfigParam("aaBlaReducedVat");
                $sVatCountry = $this->_getVatCountry($oUser);
                if (isset($aVatRates[$sVatCountry])) {
                    $ret = $aVatRates[$sVatCountry];
                }
            }
        }

        return $ret;
    }
}
