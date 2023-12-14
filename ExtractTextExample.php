<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfText;

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/DynamicPdfExamples.php';
class ExtractTextExample
{
    public static function Run(string $apikey, string $path)
    {
        $resource = new PdfResource($path . "fw4.pdf");
        $pdfText = new PdfText($resource);
        $pdfText->ApiKey =$apikey;

        $response = $pdfText->Process();
       

        if($response->IsSuccessful)
        {
            echo ($response->JsonContent);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorMessage);
        }
    }
}
#ExtractTextExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/extract-text-pdf-text-endpoint/");