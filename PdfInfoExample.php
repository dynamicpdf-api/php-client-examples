<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInfo;

class PdfInfoExample
{
    private static $BasePath = __DIR__;
    // Simple example from Getting Started - pdf-info
    public static function RunExample()
    {
        $resource = new PdfResource(PdfInfoExample::$BasePath . "/Resources/client-libraries-examples/fw4.pdf");
        $pdfInfo = new PdfInfo($resource);
        $response = $pdfInfo->Process();
        if ($response->JsonContent != null) {
            echo ($response->JsonContent);
        } else {
            echo (json_encode($response));
        }
    }
}
