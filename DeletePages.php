<?php

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/DynamicPdfExamples.php';
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