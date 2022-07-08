<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\LayoutDataResource;

require __DIR__ . '/vendor/autoload.php';

// https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/pdf-tutorial-dlex-pdf-endpoint

class CreatePdfDlex {

    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/create-pdf-dlex/";

    public static function Run() {

        $pdf = new Pdf();
        $pdf->ApiKey ="DP.API-KEY";
        $layoutData = new LayoutDataResource(CreatePdfDlex::$BasePath . "SimpleReportWithCoverPage.json");
        $pdf->AddDlex("samples/creating-pdf-pdf-endpoint/SimpleReportWithCoverPage.dlex", $layoutData);

        //call the pdf endpoint and return response
        $response = $pdf->Process();
        
        //if response is successful the save the PDF returned from endpoint
        if($response->IsSuccessful)
        {
            file_put_contents(CreatePdfDlex::$BasePath . "create-pdf-dlex-php-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorMessage);
        }
    }
}
CreatePdfDlex::Run();