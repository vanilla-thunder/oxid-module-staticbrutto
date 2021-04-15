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

namespace VanillaThunder\StaticBrutto\Application\Controllers\Admin;
use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;
use OxidEsales\Eshop\Application\Model\CountryList;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Configuration\Bridge\ModuleSettingBridge;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Configuration\Bridge\ModuleSettingBridgeInterface;

class VatController extends AdminDetailsController
{
    /**
     * @return string
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     */
    public function render()
    {
        parent::render();
        $cfg = Registry::getConfig();

        /** @var CountryList $aCountries */
        $aCountries = oxNew(CountryList::class);
        $aCountries->loadActiveCountries();
        $this->_aViewData["countries"] = $aCountries;

        /** @var ModuleSettingBridge $moduleSettingBridge */
        $moduleSettingBridge = ContainerFactory::getInstance()
            ->getContainer()
            ->get(ModuleSettingBridgeInterface::class);

        $this->_aViewData["aaStaticBruttoFullVat"] = $moduleSettingBridge->get('aaStaticBruttoFullVat', 'vt-staticbrutto');
        $this->_aViewData["aaStaticBruttoReducedVat"] = $moduleSettingBridge->get('aaStaticBruttoReducedVat','vt-staticbrutto');

        return "vt_staticbrutto_vats.tpl";
    }


    /**
     *
     */
    public function save_vats()
    {
        $cfg = Registry::getConfig();
        /** @var Request $request */
        $request = Registry::get(Request::class);

        /** @var ModuleSettingBridge $moduleSettingBridge */
        $moduleSettingBridge = ContainerFactory::getInstance()
            ->getContainer()
            ->get(ModuleSettingBridgeInterface::class);

        // first vat rates
        $aaStaticBruttoFullVat = $request->getRequestParameter("aaStaticBruttoFullVat");
        //$cfg->saveShopConfVar("aarr", "aaStaticBruttoFullVat", $aaStaticBruttoFullVat, null,"module:vt-staticbrutto");
        $moduleSettingBridge->save('aaStaticBruttoFullVat', $aaStaticBruttoFullVat, 'vt-staticbrutto');

        // second vat rates
        $aaStaticBruttoReducedVat = $request->getRequestParameter("aaStaticBruttoReducedVat");
        //$cfg->saveShopConfVar("aarr", "aaStaticBruttoReducedVat", $aaStaticBruttoReducedVat, null, "module:vt-staticbrutto");
        $moduleSettingBridge->save('aaStaticBruttoReducedVat', $aaStaticBruttoReducedVat, 'vt-staticbrutto');

        $this->_aViewData["msg"] = "saved!";
    }
}