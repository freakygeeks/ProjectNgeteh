<?php

use App\ReceivingProduct;

class ReportReceivingsDetailed {

    public static function receiving_detailed($receiving_id)
    {
        $receivingproducts = ReceivingProduct::where('receiving_id', $receiving_id)->get();
        return $receivingproducts;
    }

}