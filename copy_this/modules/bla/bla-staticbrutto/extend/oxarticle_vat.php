<?php

class oxarticle_vat extends oxarticle_vat_parent
{
    public function getBasePrice( $dAmount = 1 )
    {
        // override this function if you want e.g. different prices
        // for diff. user groups.

        // Performance
        $myConfig = $this->getConfig();
        if( !$myConfig->getConfigParam( 'bl_perfLoadPrice' ) || !$this->_blLoadPrice )
            return null;

        // GroupPrice or DB price ajusted by AmountPrice
        $dPrice = $this->_getAmountPrice( $dAmount );


        if (false == $this->getConfig()->getConfigParam('blEnterNetPrice')) {

            $dActiveVat  = oxRegistry::get("oxVatSelector")->getArticleVat($this);
            $dDefaultVat = oxRegistry::get("oxVatSelector")->getArticleVat($this, 1);

            $dPrice = $dPrice / (1 + $dDefaultVat / 100) * (1 + $dActiveVat / 100);
        }

        return $dPrice;
    }

}