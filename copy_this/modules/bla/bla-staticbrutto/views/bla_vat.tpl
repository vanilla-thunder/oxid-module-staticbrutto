<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
</head>
<body>
<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
	[{ $oViewConf->getHiddenSid() }]
	<input type="hidden" name="oxid" value="[{ $oxid }]">
	<input type="hidden" name="oxidCopy" value="[{ $oxid }]">
	<input type="hidden" name="cl" value="country_main">
	<input type="hidden" name="language" value="[{ $actlang }]">
</form>
<form id="vats" method="post" action="[{$oViewConf->getSelfLink()}]">
	[{ $oViewConf->getHiddenSid() }]
	<input type="hidden" name="cl" value="bla_vat"/>
	<input type="hidden" name="fnc" value="save_vats"/>
	<table style="width:500px;margin: 0 auto;" border="0" cellspacing="10" cellpadding="0">
		<colgroup><col width="50%"><col width="25%"><col width="25%"></colgroup>
		<tr>
			<td><strong>[{oxmultilang ident="bla_vat_country"}]</strong></td>
			<td><strong>[{oxmultilang ident="bla_vat_first"}]</strong></td>
			<td><strong>[{oxmultilang ident="bla_vat_second"}]</strong></td>
		</tr>
		[{foreach from=$countries item="country" name="countries"}]
			[{assign var="id" value=$country->oxcountry__oxid->value }]
			<tr>
				<td><label>[{$country->oxcountry__oxtitle->value}]</label></td>
				<td><input type="text" name="aaBlaFullVat[[{$country->oxcountry__oxid->value}]]"  value="[{ $aaBlaFullVat.$id }]"  size="3"/>%</td>
				<td><input type="text" name="aaBlaReducedVat[[{$country->oxcountry__oxid->value}]]" value="[{ $aaBlaReducedVat.$id }]" size="3"/>%</td>
			</tr>
		[{/foreach}]
		<tr>
			<th colspan="3">
				[{if $msg}]<h2 style="color:green">[{$msg}]</h2>[{/if}]<button type="submit">[{oxmultilang ident="bla_vat_save"}]</button>
			</th>
		</tr>
	</table>
</form>
</body>
</html>
