<?php

use Picqer\Barcode\BarcodeGenerator;
use Picqer\Barcode\BarcodeGeneratorPNG;

if (!function_exists('generate_barcode')) {
    function generate_barcode($text)
    {
        $generator = new BarcodeGeneratorPNG();
        return '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($text, BarcodeGenerator::TYPE_CODE_128)) . '" />';
    }
}
