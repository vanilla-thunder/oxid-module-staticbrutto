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

$sMetadataVersion = '1.1';
$aModule = array(
	'id' => 'bla-staticbrutto',
	'title' => '<strong style="color:#95b900;font-size:125%;">best</strong><strong style="color:#c4ca77;font-size:125%;">life</strong> <strong>static brutto price</strong>',
	'description' => 'Adds support for countryspecific VAT and calculates and keeps same brutto price among different VAT percentage',
	'thumbnail' => 'bestlife.png',
	'version' => '1.0.1 (2017-04-19)',
	'author' => 'Marat Bedoev, bestlife AG',
	'email' => 'oxid@bestlife.ag',
	'url' => 'http://www.bestlife.ag',
	'extend' => array(
		'oxvatselector' => 'bla/bla-staticbrutto/extend/oxvatselector_vat'
	),
	'files' => array(
		'bla_vat' => 'bla/bla-staticbrutto/files/bla_vat.php',
		'bla_vat_events' => 'bla/bla-staticbrutto/files/bla_vat_events.php',
	),
	'templates' => array(
		'bla_vat.tpl' => 'bla/bla-staticbrutto/views/bla_vat.tpl'
	),
	'events' => array(
		'onActivate' => 'bla_vat_events::setup',
	),
	'settings' => array(
		array('group' => 'blaVatMain', 'name' => 'aaBlaFullVat', 'type' => 'aarr', 'value' => ''),
		array('group' => 'blaVatMain', 'name' => 'aaBlaReducedVat', 'type' => 'aarr', 'value' => ''),
	)
);
