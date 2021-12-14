<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\PdfXmp;
use DynamicPDF\Api\PdfResource;

class GetXmpMetaData {

    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/get-xmp-metadata";

    public static function Run()
    {
        $resource = new PdfResource(GetXmpMetaData::$BasePath . "/fw4.pdf");
        $pdfXmp = new PdfXmp($resource);
        $pdfXmp->ApiKey = "DP.7vATWolKJ4xdaefbf/pTgSW7uGWofsZAKctZ1J/hzV9yTrzDvmDI1lwT";
        $response = $pdfXmp->Process();
        
        if($response->IsSuccessful)
        {
            echo($response->Content);
        } else {
            echo($response->ErrorMessage);
        }
    }
}
GetXmpMetaData::Run();