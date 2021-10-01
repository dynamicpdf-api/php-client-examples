<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfXmp;

class PdfXmpExample
{

    public static function RunExample($baseUrl, $basePath)
    {
        $resource = new PdfResource($basePath . "/Resources/client-libraries-examples/fw4.pdf");
        $pdfXmp = new PdfXmp($resource);
        $pdfXmp->BaseUrl = $baseUrl;
        $response = $pdfXmp->Process();
        echo ($response->Content);
    }
}
