<?php
/**
 * @package Internetfabrik
 * @author Florian Palme <florian.palme@internetfabrik.de>
 */

namespace ProudCommerce\Bla\StaticBrutto\Application\Model;


use OxidEsales\Eshop\Core\Registry;

class VatSelector extends VatSelector_parent
{
    /**
     * @inheritdoc
     */
    public function getArticleVat(\OxidEsales\Eshop\Application\Model\Article $oArticle)
    {
        $ret = parent::getArticleVat($oArticle);
        $cfg = Registry::getConfig();

        if ($oUser = Registry::getSession()->getBasket()->getBasketUser())
        {
            // got default vat?
            $aVatRates   = ($ret == $cfg->getConfigParam('dDefaultVAT')) ? Registry::getConfig()->getConfigParam("aaBlaFullVat") : Registry::getConfig()->getConfigParam("aaBlaReducedVat");
            $sVatCountry = $this->_getVatCountry($oUser);
            if (isset($aVatRates[$sVatCountry]))
                $ret = $aVatRates[$sVatCountry];
        }

        return $ret;
    }
}