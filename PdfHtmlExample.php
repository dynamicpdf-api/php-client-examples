<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\HtmlResource;

require __DIR__ . '/vendor/autoload.php';

// https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/pdf-tutorial-dlex-pdf-endpoint

class PdfHtmlExample {

    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/html-pdf/";

    public static function Run() {

        $pdf = new Pdf();
        $pdf->ApiKey ="DP.xxx-api-key-xxx";
        $pdf->AddHtml("<html><p>This is a test.</p></html>");

        $resource = new HtmlResource(PdfHtmlExample::$BasePath . "HtmlWithAllTags.html");
        $pdf->AddHtml($resource);

        $pdf->AddHtml("<html><img src='./images/logo.png'></img></html>", "https://www.dynamicpdf.com");

        //call the pdf endpoint and return response
        $response = $pdf->Process();
        
        //if response is successful the save the PDF returned from endpoint
        if($response->IsSuccessful)
        {
            file_put_contents(PdfHtmlExample::$BasePath . "html-php-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }
    }
}
PdfHtmlExample::Run();