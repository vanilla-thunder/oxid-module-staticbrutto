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

$sLangName = 'English';
$style = '<style type="text/css">.groupExp a.rc b {font-size: medium; color: #ff3600; }.groupExp dt input.txt { width: 430px !important} .groupExp dl { display: block !important; } input.confinput {position: fixed; top: 20px; right: 70px; background: #008B2D; padding: 10px 25px; color: white; border: 1px solid black; cursor:pointer; font-size: 125%; } input.confinput:hover {outline: 3px solid #ff3600;} .groupExp dt textarea.txtfield {width: 430px; height: 150px;}</style>';
$aLang = array(
    'charset' => 'UTF-8',
    'SHOP_MODULE_GROUP_StaticBruttoVatMain' => $style . 'Options',
    'SHOP_MODULE_aaStaticBruttoFullVat' => 'your default VAT rates (usually the full one)',
    'SHOP_MODULE_aaStaticBruttoReducedVat' => 'alternative VAT rates (usually the reduced one)',

);
