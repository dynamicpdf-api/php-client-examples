<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

use DynamicPDF\Api\AdditionalResourceType;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\LayoutDataResource;
require __DIR__ . '/vendor/autoload.php';
include_once("constants.php");

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
CreatePdfDlex::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "/creating-pdf-pdf-endpoint/", CLIENT_EXAMPLES_OUTPUT_PATH);