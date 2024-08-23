<?php

namespace App\Helpers;

use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class BarcodeGenerator
{
    public static function generate1DBarcode($data)
    {
        $barcode = new DNS1D();
        return $barcode->getBarcodePNG($data, 'C128');
    }

    public static function generateQRcode($data)
    {
        $qrCode = new DNS2D();
        return $qrCode->getBarcodePNG($data, 'QRCODE');
    }
}
