<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfText;
include_once("constants.php");
require __DIR__ . '/vendor/autoload.php';

class PdfTextExample
{
    public static function Run(string $apikey, string $path)
    {
        $resource = new PdfResource($path . "fw4.pdf");
        $pdfText = new PdfText($resource);
        $pdfText->ApiKey = $apikey;
        $response = $pdfText->Process();
        echo ($response->JsonContent);
    }
}
PdfTextExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "pdf-info/");