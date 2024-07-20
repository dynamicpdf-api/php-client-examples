<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

require __DIR__ . '/vendor/autoload.php';
include_once("constants.php");
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;

class DeletePages
{
    public static function Run(string $apikey, string $path, string $output_path)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;

        $pdfInput = $pdf->AddPdf(new PdfResource($path . "pdfnumberedinput.pdf"));
        $pdfInput->StartPage = 1;
        $pdfInput->PageCount = 3;

        $pdfInput2 = $pdf->AddPdf(new PdfResource($path . "pdfnumberedinput.pdf"));
        $pdfInput2->StartPage = 6;
        $pdfInput2->PageCount = 2;

        $response = $pdf->Process();

        if($response->IsSuccessful)
        {
            file_put_contents($output_path . "delete-pages-output.pdf", $response->Content);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorJson);
        }
    }
}
DeletePages::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH ."delete-pages/", CLIENT_EXAMPLES_OUTPUT_PATH);