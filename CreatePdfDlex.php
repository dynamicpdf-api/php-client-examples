<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\LayoutDataResource;
include_once __DIR__ . '/DynamicPdfExamples.php';
require __DIR__ . '/vendor/autoload.php';

// https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/pdf-tutorial-dlex-pdf-endpoint

class CreatePdfDlex {

    public static function Run(string $apikey, string $path, string $output_path) {

        $pdf = new Pdf();
        $pdf->ApiKey =$apikey;
        $layoutData = new LayoutDataResource($path . "SimpleReportWithCoverPage.json");
        $pdf->AddDlex("samples/creating-pdf-pdf-endpoint/SimpleReportWithCoverPage.dlex", $layoutData);

        //call the pdf endpoint and return response
        $response = $pdf->Process();
        
        //if response is successful the save the PDF returned from endpoint
        if($response->IsSuccessful)
        {
            file_put_contents($output_path . "create-pdf-dlex-php-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }
    }
}
#CreatePdfDlex::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/creating-pdf-pdf-endpoint/");