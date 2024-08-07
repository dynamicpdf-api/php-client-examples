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

class SplitPdf
{
    public static function Run(string $apikey, string $path, string $output_path)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;

        $pdf1 = new Pdf();
        $pdf1->ApiKey = $apikey;

        SplitPdf::Split($pdf, $path, $output_path, 1, 3, "splitpdf-one.pdf");
        SplitPdf::Split($pdf1, $path, $output_path, 6, 2, "splitpdf-two.pdf");

    }

    public static function Split(Pdf $pdf, string $path, string $output_path, int $startPage, int $pageCount, $output_file)
    {
        $pdfInput = $pdf->AddPdf(new PdfResource($path . "pdfnumberedinput.pdf"));
        $pdfInput->StartPage = $startPage;
        $pdfInput->PageCount = $pageCount;

        $response = $pdf->Process();

        if($response->IsSuccessful)
        {
            file_put_contents($output_path . $output_file, $response->Content);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorJson);
        }
    }
}
SplitPdf::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "split-pdf/", CLIENT_EXAMPLES_OUTPUT_PATH);