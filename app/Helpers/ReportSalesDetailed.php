<?php

use App\SaleProduct;

class ReportSalesDetailed {

    public static function sale_detailed($sale_id)
    {
        $SaleProducts = SaleProduct::where('sale_id', $sale_id)->get();
        return $SaleProducts;
    }

}