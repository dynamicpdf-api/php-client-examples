<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfText;

class PdfTextExample
{
    private static $BasePath = __DIR__;
    // Simple example from Getting Started - pdf-text
    public static function RunExample()
    {
        $resource = new PdfResource(PdfTextExample::$BasePath . "/Resources/client-libraries-examples/fw4.pdf");
        $pdfText = new PdfText($resource);
        $response = $pdfText->Process();
        echo ($response->JsonContent);
    }
}
