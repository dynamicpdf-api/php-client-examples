<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfXmp;

class PdfXmpExample
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-usersguide-examples/";
	private static string $ApiKey = "DP.xxx--apikey--xxx";

    public static function Run()
    {
        $resource = new PdfResource(PdfXmpExample::$BasePath . "fw4.pdf");
        $pdfXmp = new PdfXmp($resource);
        $pdfXmp->ApiKey = PdfXmpExample::$ApiKey;
        $response = $pdfXmp->Process();
        echo ($response->Content);
    }
}
PdfXmpExample::Run();
