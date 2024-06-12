<?php

use DynamicPDF\Api\AdditionalResourceType;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\LayoutDataResource;
include_once __DIR__ . '/DynamicPdfExamples.php';
require __DIR__ . '/vendor/autoload.php';


class CreatePdfDlex {

    public static function Run(string $apikey, string $path, string $output_path) {

        CreatePdfDlex::RunLocal($apikey, $path, $output_path);
        CreatePdfDlex::RunRemote($apikey, $path, $output_path);
    }

    public static function RunLocal(string $apikey, string $path, string $output_path) {

        $pdf = new Pdf();
        $pdf->ApiKey =$apikey;
        $layoutData = new LayoutDataResource($path . "SimpleReportWithCoverPage.json");
        $pdf->AddAdditionalResource($path . "Northwind Logo.gif", AdditionalResourceType::Image, "Northwind Logo.gif");

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

    public static function RunRemote(string $apikey, string $path, string $output_path) {

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
#CreatePdfDlex::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/creating-pdf-pdf-endpoint/", DynamicPdfExamples::$OUTPUT_PATH);