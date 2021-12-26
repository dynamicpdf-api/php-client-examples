<?php

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\LayoutDataResource;

require __DIR__ . '/vendor/autoload.php';

class CreatePdfDlex {

    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/create-pdf-dlex/";

    public static function Run() {

        $pdf = new Pdf();
        $pdf->ApiKey ="DP.F9KH87xzX6JFVE4YGbkLU4nvx7fbnjXOKIr7wPWYPRdaRJe7OlYQ+/cw";
        $layoutData = new LayoutDataResource(CreatePdfDlex::$BasePath . "SimpleReportWithCoverPage.json");
        $pdf->AddDlex("samples/creating-pdf-pdf-endpoint/SimpleReportWithCoverPage.dlex", $layoutData);

        $pdfResource = new PdfResource(CreatePdfDlex::$BasePath . "DocumentA.pdf");
        $pdf->AddPdf($pdfResource);

        //call the pdf endpoint and return response
        $response = $pdf->Process();
        
        //if response is successful the save the PDF returned from endpoint
        if($response->IsSuccessful)
        {
            file_put_contents(CreatePdfDlex::$BasePath . "create-pdf-dlex-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorMessage);
        }
    }
}
CreatePdfDlex::Run();