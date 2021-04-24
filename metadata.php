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

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = array(
    'id' => 'vt-staticbrutto',
    'title' => [
        'de' => '[vt] statische brutto Preise',
        'en' => '[vt] static brutto prices'
    ],
    'description' => [
        'de' => '<ul><li>grundlegende Unterstützung für länderspezifische Mehrwertwsteuersätze</li><li>behält den selben Brutto Preis bei unterschiedlichen MwSt. Sätzen</li></ul><img src="../modules/vt/StaticBrutto/thumbnail.jpg"/>',
        'en' => '<ul><li>basic support for country specific VAT</li><li>keeps same brutto price among different VAT percentages</li></ul><img src="../modules/vt/StaticBrutto/thumbnail.jpg"/>',
    ],
    'version' => '2.1.1',
    'thumbnail' => '',
    'author' => 'Marat Bedoev & ProudCommerce & Florian Palme',
    'url' => 'https://github.com/vanilla-thunder/oxid-module-staticbrutto',
    'email' => openssl_decrypt("Az6pE7kPbtnTzjHlPhPCa4ktJLphZ/w9gKgo5vA//p4=", str_rot13("nrf-128-pop"), str_rot13("gvalzpr")),
    'extend' => [
        \OxidEsales\Eshop\Application\Model\VatSelector::class => \VanillaThunder\StaticBrutto\Application\Extend\VatSelector::class,
    ],
    'controllers' => [
        'vt_staticbrutto_vats' => \VanillaThunder\StaticBrutto\Application\Controllers\Admin\VatController::class,
    ],
    'templates' => [
        'vt_staticbrutto_vats.tpl' => 'vt/StaticBrutto/Application/views/admin/vt_staticbrutto_vats.tpl'
    ],
    'settings' => [
        [
            'group' => 'StaticBruttoVatMain',
            'name' => 'aaStaticBruttoFullVat',
            'type' => 'aarr',
            'value' => []
        ],

        [
            'group' => 'StaticBruttoVatMain',
            'name' => 'aaStaticBruttoReducedVat',
            'type' => 'aarr',
            'value' => []
        ],
    ]
);
