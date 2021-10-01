<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInfo;

class PdfInfoExample
{
    // simple example from Getting Started - pdf-info

    public static function RunExample($baseUrl, $basePath)
    {
        $resource = new PdfResource($basePath . "/Resources/client-libraries-examples/fw4.pdf");
        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->BaseUrl = $baseUrl;
        $response = $pdfInfo->Process();
        if ($response->JsonContent != null) {
            echo ($response->JsonContent);
        } else {
            echo (json_encode($response));
        }
    }
}
