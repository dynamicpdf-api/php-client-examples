<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfText;

class PdfTextExample
{
    // simple example from Getting Started - pdf-text

    public static function RunExample($baseUrl, $basePath)
    {
        $resource = new PdfResource($basePath . "/Resources/client-libraries-examples/fw4.pdf");
        $pdfText = new PdfText($resource);
        $pdfText->BaseUrl = $baseUrl;
        $response = $pdfText->Process();
        echo ($response->JsonContent);
    }
}
