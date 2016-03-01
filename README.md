## Länderspezifische Mehrwertsteuer + fester Brutto-Preis unabhängig vom Steuersatz Für OXID eShop
### Modul Version 1.0

Bei länderspezifischen Mehrwertsteuersätzen berechnet OXID zuerst den Netto-Preis und addiert dann die jeweiligen MwSt, wodurch sich der Bruttopreis im WK ändert.
Dieses Modul lässt den Brutto-Preris unabhängig vom Steuersatz gleich bleiben, so dass der Netto-Preis jeweils angepasst wird. 
Benutzung auf eigene Gefahr! Rauchen kann tödlich sein!

## Installation:
* Archiv herunterladen:  
   für 4.9: https://github.com/vanilla-thunder/bla-staticbrutto/archive/master.zip  
   für 4.6: https://github.com/vanilla-thunder/bla-staticbrutto/archive/4.6.zip
* entpacken 
* Inhalt von "copy_this" in den Shop hochladen
* Prüfen, ob alle benötigten Länder aktiv sind
* Modul aktivieren
* F5 drücken
* Unter "Stammdaten" -> "Mwst. Sätze" die Mehrwersteuersätze eintragen und speichern
* testen
* wenns läuft, ein Bierchen trinken. Wenn nicht, dann zwei.

## Funktionsweise 
In den Einstellungen muss man den Standard-Steuersatz hinterlegen (normalerwise 19%).  
Falls der Artikel über keinen eigenen Steuersatz verfügt, wird der jeweils volle Steuersatz für das aktuell ausgewählte Rechnungsandressen-Land genommen, sonst der reduzierte Steuersatz.
### Beispielrechnung:
Standard Steuersatz: 19%  
Produkt hat keinen eigenen Steuersatz + Lieferland Österreich -> 20% (bzw das, was ihr eingetragen habt)  
Produkt hat 7% + Lieferland Österreich -> 9% (bzw das, was ihr eingetragen habt)  

Das Modul läuft bei uns schon seit ein paar Jahren, hier zu sehen https://www.bestlife-shop.de/   
Bitte Prüft vorher, ob ihr Produkte im Shop habt, die in DE einem reduzierten MwSt Satz unterliegen, in einem anderen Land aber einem vollen MwSt Satz. Wenns so ist, schreibt mich an, wir finden schon eine Lösung. 


### LICENSE AGREEMENT
   countryspecific VAT and static brutto price no matter of VAT percentage  
   Copyright (C) 2016 bestlife AG  
   info:  oxid@bestlife.ag  
  
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
