<?php

require __DIR__ . '/vendor/autoload.php';
include_once("constants.php");
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfXmp;

class PdfXmpExample
{
    public static function Run(string $apikey, string $path)
    {
        $resource = new PdfResource($path . "fw4.pdf");
        $pdfXmp = new PdfXmp($resource);
        $pdfXmp->ApiKey = $apikey;
        $response = $pdfXmp->Process();
        echo ($response->Content);
    }
}
PdfXmpExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "pdf-info/");