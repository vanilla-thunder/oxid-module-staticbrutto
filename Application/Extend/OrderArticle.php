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


class OrderArticle extends OrderArticle_parent
{
    /**
     * Loads, caches and returns real order article instance. If article is not
     * available (deleted from db or so) false is returned
     *
     * @param string $sArticleId article id (optional, is not passed oxorderarticles__oxartid will be used)
     *
     * @return \OxidEsales\Eshop\Application\Model\Article|false
     * @deprecated underscore prefix violates PSR12, will be renamed to "getOrderArticle" in next major
     */
    protected function _getOrderArticle($sArticleId = null) // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
    {
        return parent::_getOrderArticle(($sArticleId));
        /* parent function:
        if ($this->_oOrderArticle === null) {
            $this->_oOrderArticle = false;

            $sArticleId = $sArticleId ? $sArticleId : $this->getProductId();
            $oArticle = oxNew(\OxidEsales\Eshop\Application\Model\Article::class);
            $oArticle->setLoadParentData(true);
            if ($oArticle->load($sArticleId)) {
                $this->_oOrderArticle = $oArticle;
            }
        }
        */

        // setting country specific vat to prevent resetting vat during order recalculation
        /** @var Article $this->_oOrderArticle */
        $dCountryVat = doubleval($this->oxorderarticles__oxvat->value);
        $this->_oOrderArticle->assign(["oxarticles__oxvat" => $dCountryVat]);
        $this->_oOrderArticle->setArticleVat($dCountryVat);

        return $this->_oOrderArticle;
    }
}
