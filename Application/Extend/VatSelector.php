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

class VatSelector extends VatSelector_parent
{
    /**
     * @inheritdoc
     */
    public function getArticleVat(\OxidEsales\Eshop\Application\Model\Article $oArticle)
    {
        $ret = parent::getArticleVat($oArticle);
        if ($oUser = \OxidEsales\Eshop\Core\Registry::getSession()->getBasket()->getBasketUser())
        {
            // got default vat?
            if ($ret > 0)
            {
                $cfg = \OxidEsales\Eshop\Core\Registry::getConfig();
                $aVatRates   = ($ret == $cfg->getConfigParam('dDefaultVAT')) ? $cfg->getConfigParam("aaStaticBruttoFullVat") : $cfg->getConfigParam("aaStaticBruttoReducedVat");
                $sVatCountry = (method_exists($this, "_getVatCountry") ? $this->_getVatCountry($oUser) : $this->getVatCountry($oUser)); // _getVatCountry is depracted, will be removed soon
                if (isset($aVatRates[$sVatCountry])) $ret = $aVatRates[$sVatCountry];
            }
        }

        return $ret;
    }
}
