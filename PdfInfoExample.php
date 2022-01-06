<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInfo;

class PdfInfoExample
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-usersguide-examples/";
	private static string $ApiKey = "DP.xxx--apikey--xxx";
    
    public static function Run()
    {
        $resource = new PdfResource(PdfInfoExample::$BasePath . "DocumentA.pdf");
        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = PdfInfoExample::$ApiKey;
        $response = $pdfInfo->Process();
        echo (json_encode($response));
    }
}
PdfInfoExample::Run();