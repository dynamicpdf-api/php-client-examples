<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\HtmlResource;
include_once __DIR__ . '/DynamicPdfExamples.php';
require __DIR__ . '/vendor/autoload.php';

// https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/pdf-tutorial-dlex-pdf-endpoint

class PdfHtmlExample {

    public static function Run(string $apikey, string $path) {

        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;
        $pdf->AddHtml("<html><p>This is a test.</p></html>");

        $resource = new HtmlResource($path . "HtmlWithAllTags.html");
        $pdf->AddHtml($resource);

        $pdf->AddHtml("<html><img src='./images/logo.png'></img></html>", "https://www.dynamicpdf.com");

        //call the pdf endpoint and return response
        $response = $pdf->Process();
        
        //if response is successful the save the PDF returned from endpoint
        if($response->IsSuccessful)
        {
            file_put_contents($path . "html-php-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }
    }
}