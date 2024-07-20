<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\HtmlResource;
include_once("constants.php");
require __DIR__ . '/vendor/autoload.php';

class PdfHtmlExample {

    public static function Run(string $apikey, string $path, string $output_path) {

        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;
        $pdf->AddHtml("<html><p>This is a test.</p></html>");

        $filePath =  Utility::GetFileData($path . "HtmlWithAllTags.html");
        $resource = new HtmlResource($filePath);
        $pdf->AddHtml($resource);

        $pdf->AddHtml("<html><img src='./images/logo.png'></img></html>", "https://www.dynamicpdf.com");

        //call the pdf endpoint and return response
        $response = $pdf->Process();
        
        //if response is successful the save the PDF returned from endpoint
        if($response->IsSuccessful)
        {
            file_put_contents($output_path . "html-php-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }
    }
}
PdfHtmlExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "users-guide/", CLIENT_EXAMPLES_OUTPUT_PATH);