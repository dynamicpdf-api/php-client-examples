<?php

require __DIR__ . '/vendor/autoload.php';
include_once("constants.php");
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;

class MergePdfs
{
    public static function Run(string $apikey, string $path, string $output_path)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;
        $pdf->BaseUrl = "https://api-euw.dpdf.io/";

        $pdfInput = $pdf->AddPdf(new PdfResource($path . "DocumentA.pdf"));
        $pdfInput->StartPage = 1;
        $pdfInput->PageCount = 1;

        $pdf->AddPdf(new PdfResource($path . "DocumentB.pdf"));
        $pdf->AddPdf("samples/merge-pdfs-pdf-endpoint/DocumentC.pdf");

        $response = $pdf->Process();

        if($response->IsSuccessful)
        {
            file_put_contents($output_path . "merge-pdfs-php-output.pdf", $response->Content);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorJson);
        }
    }
}
MergePdfs::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "/merge-pdfs-pdf-endpoint/", CLIENT_EXAMPLES_OUTPUT_PATH);