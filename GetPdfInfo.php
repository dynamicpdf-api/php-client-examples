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
        $pdfInfo->ApiKey = "DP.NKSoPxiwOgZoypSVYaXyEARo2cO9Kk5BRgY2ZRC0jF/KQq4pDzhfK8yO";
        $response = $pdfInfo->Process();
        if ($response->IsSuccessful) {
            echo ($response->JsonContent);
        } else {
            echo (json_encode($response));
        }
    }
}
GetPdfInfo::Run();
