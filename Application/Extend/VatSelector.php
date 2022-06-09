<?php
/*
 * vanilla-thunder/oxid-module-staticbrutto
 * country specific VAT and static brutto prices for OXID eShop V6.2 and newer
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */

namespace VanillaThunder\StaticBrutto\Application\Extend;

use OxidEsales\Eshop\Core\Registry;

class VatSelector extends VatSelector_parent
{
    /**
     * @inheritDoc
     */
    public function getBasketItemVat(\OxidEsales\Eshop\Application\Model\Article $oArticle, $oBasket)
    {
<<<<<<< HEAD
        $dVat =  parent::getArticleVat($oArticle);

        return $dVat;
        //if (($sVatCountry = $_COOKIE["sVatCountry"]) || ($oUser = \OxidEsales\Eshop\Core\Registry::getSession()->getBasket()->getBasketUser()))
        if ($oUser = \OxidEsales\Eshop\Core\Registry::getSession()->getBasket()->getBasketUser())
=======
        $dVat = parent::getBasketItemVat($oArticle, $oBasket);
        if ($oUser = $oBasket->getBasketUser())
>>>>>>> e3504dac9d573133e07b715400c2629f01d7c637
        {
            // got default vat?
            if ($dVat > 0)
            {
                $cfg = \OxidEsales\Eshop\Core\Registry::getConfig();
                //var_dump($cfg->getConfigParam('dDefaultVAT'));
                $aVatRates   = ($dVat == $cfg->getConfigParam('dDefaultVAT')) ? $cfg->getConfigParam("aaStaticBruttoFullVat") : $cfg->getConfigParam("aaStaticBruttoReducedVat");
                $sVatCountry = (method_exists($this, "_getVatCountry") ? $this->_getVatCountry($oUser) : $this->getVatCountry($oUser)); // _getVatCountry is depracted, will be removed soon
                if (isset($aVatRates[$sVatCountry])) $dVat = $aVatRates[$sVatCountry];
                Registry::getSession()->getBasket()->onUpdate();
            }
        }
<<<<<<< HEAD

        return $dVat;
    }

    /**
     * @inheritDoc
     */
    public function getBasketItemVat(\OxidEsales\Eshop\Application\Model\Article $oArticle, $oBasket)
    {
        $dVat = parent::getBasketItemVat($oArticle, $oBasket);
        if ($oUser = $oBasket->getBasketUser())
        {
            // got default vat?
            if ($dVat > 0)
            {
                $cfg = \OxidEsales\Eshop\Core\Registry::getConfig();
                //var_dump($cfg->getConfigParam('dDefaultVAT'));
                $aVatRates   = ($dVat == $cfg->getConfigParam('dDefaultVAT')) ? $cfg->getConfigParam("aaStaticBruttoFullVat") : $cfg->getConfigParam("aaStaticBruttoReducedVat");
                $sVatCountry = (method_exists($this, "_getVatCountry") ? $this->_getVatCountry($oUser) : $this->getVatCountry($oUser)); // _getVatCountry is depracted, will be removed soon
                if (isset($aVatRates[$sVatCountry])) $dVat = $aVatRates[$sVatCountry];
                Registry::getSession()->getBasket()->onUpdate();
            }
        }
=======
>>>>>>> e3504dac9d573133e07b715400c2629f01d7c637
        return $dVat;
    }
}
