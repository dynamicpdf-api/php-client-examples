<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInfo;

class GetPdfInfo
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/get-pdf-info/";

    public static function Run()
    {
        $resource = new PdfResource(GetPdfInfo::$BasePath . "fw4.pdf");
        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = "DP.xxx-api-key-xxx";
        $response = $pdfInfo->Process();
        if ($response->IsSuccessful) {
            echo ($response->JsonContent);
        } else {
            echo (json_encode($response));
        }
    }
}
GetPdfInfo::Run();
