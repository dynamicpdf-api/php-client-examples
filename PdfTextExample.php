<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfText;

require __DIR__ . '/vendor/autoload.php';

class PdfTextExample
{
	private static string $BasePath = "C:/temp/dynamicpdf-api-usersguide-examples/";
	private static string $ApiKey = "DP.xxx-api-key-xxx";

    public static function Run()
    {
        $resource = new PdfResource(PdfTextExample::$BasePath . "fw4.pdf");
        $pdfText = new PdfText($resource);
        $pdfText->ApiKey = PdfTextExample::$ApiKey;
        $response = $pdfText->Process();
        echo ($response->JsonContent);
    }
}
PdfTextExample::Run();