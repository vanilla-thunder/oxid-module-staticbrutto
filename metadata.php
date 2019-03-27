<?php
/**
 *
 * @package ##@@PACKAGE@@##
 * @version ##@@VERSION@@##
 * @link www.proudcommerce.com
 * @author Proud Sourcing <support@proudcommerce.com>
 * @copyright Proud Sourcing GmbH | 2019
 *
 * This Software is the property of Proud Sourcing GmbH
 * and is protected by copyright law, it is not freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be
 * prosecuted by civil and criminal law.
 *
 **/

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = array(
    'id' => 'bla-staticbrutto',
    'title' => '<strong style="color:#95b900;font-size:125%;">best</strong><strong style="color:#c4ca77;font-size:125%;">life</strong> <strong>static brutto price</strong>',
    'description' => [
        'de' => 'Adds support for countryspecific VAT and calculates and keeps same brutto price among different VAT percentage
        
        <br /><br />Da es zum Zeitpunkt der Migration auf OXID 6 keinen eingetragenen Vendor-Namespace für die Bestlife AG gab, wurde es in den Namespace von ProudCommerce gechrieben, um Probleme zu vermeiden.',
        'en' => 'Adds support for countryspecific VAT and calculates and keeps same brutto price among different VAT percentage',
    ],
    'version' => '2.0.0',
    'thumbnail' => 'bestlife.png',
    'author' => 'Marat Bedoev, bestlife, ProudCommerce',
    'url' => 'http://www.bestlife.ag',
    'email' => 'oxid@bestlife.ag',
    'controllers' => [
        'bla_vat' => \ProudCommerce\Bla\StaticBrutto\Application\Controllers\Admin\VatController::class,
    ],

    'extend' => [
        \OxidEsales\Eshop\Application\Model\VatSelector::class
        => \ProudCommerce\Bla\StaticBrutto\Application\Model\VatSelector::class,
    ],

    'templates' => [
        'bla_vat.tpl' => 'bla/staticbrutto/Application/views/admin/bla_vat.tpl'
    ],

    'blocks' => [
    ],

    'settings' => [
        [
            'group' => 'blaVatMain',
            'name' => 'aaBlaFullVat',
            'type' => 'aarr',
            'value' => ''
        ],

        [
            'group' => 'blaVatMain',
            'name' => 'aaBlaReducedVat',
            'type' => 'aarr',
            'value' => ''
        ],
    ],

    'events' => [
        'onActivate' => '\ProudCommerce\Bla\StaticBrutto\Core::setup',
    ],
);
