<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\LayoutDataResource;



class CreatingPdfDlexString
{
    private static string $BasePath = "C:/temp/dlex-resource/";

    public static function Run()
    {
        $file_content = file(CreatingPdfDlexString::$BasePath . "SimpleReportWithCoverPage.json");
        $layoutData = new LayoutDataResource($file_content);
        
        $pdf = new Pdf();
        $pdf->ApiKey ="DP---API-KEY---";
         $pdf->AddDlex("samples/dlex-layout/SimpleReportWithCoverPage.dlex", $layoutData);

        //call the pdf endpoint and return response
        $response = $pdf->Process();
        
        //if response is successful the save the PDF returned from endpoint
        if($response->IsSuccessful)
        {
            file_put_contents(CreatingPdfDlexString::$BasePath . "create-pdf-dlex-php-string-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }
    }
}
CreatingPdfDlexString::Run();