<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfXmp;

class PdfXmpExample
{
    private static $BasePath = __DIR__;
    public static function RunExample()
    {
        $resource = new PdfResource(PdfXmpExample::$BasePath . "/Resources/client-libraries-examples/fw4.pdf");
        $pdfXmp = new PdfXmp($resource);
        $response = $pdfXmp->Process();
        echo ($response->Content);
    }
}
