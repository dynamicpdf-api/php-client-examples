<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;

class MergePdfs
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/";

    public static function Run()
    {
        $pdf = new Pdf();
        $pdf->ApiKey = "DP.P6WqEDZ0vFA3I1wKj8VQj8HWDSEaH6vEMhRNg9QPbOSSQ5sGgN07u7fB";

        $pdfInput = $pdf->AddPdf(new PdfResource(MergePdfs::$BasePath . "DocumentA.pdf"));
        $pdfInput->StartPage = 1;
        $pdfInput->PageCount = 1;

        $pdf->AddPdf(new PdfResource(MergePdfs::$BasePath . "DocumentB.pdf"));
        $pdf->AddPdf("samples/merge-pdfs-pdf-endpoint/DocumentC.pdf");

        $response = $pdf->Process();

        if($response->IsSuccessful)
        {
            file_put_contents(MergePdfs::$BasePath . "merge-pdfs-output.pdf", $response->Content);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorMessage);
        }
    }
}
MergePdfs::Run();