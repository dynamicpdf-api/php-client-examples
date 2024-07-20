<?php

require __DIR__ . '/vendor/autoload.php';
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\LayoutDataResource;
include_once("constants.php");

class CreatingPdfDlexString
{
    public static function Run(string $apikey, string $path, string $output_path)
    {
        $file_content = file($path . "SimpleReportWithCoverPage.json");
        $layoutData = new LayoutDataResource($file_content);
        
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;
         $pdf->AddDlex("samples/creating-pdf-pdf-endpoint/SimpleReportWithCoverPage.dlex", $layoutData);

        //call the pdf endpoint and return response
        $response = $pdf->Process();
        
        //if response is successful the save the PDF returned from endpoint
        if($response->IsSuccessful)
        {
            file_put_contents($output_path . "create-pdf-dlex-php-string-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }
    }
}
CreatingPdfDlexString::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "creating-pdf-pdf-endpoint/", CLIENT_EXAMPLES_OUTPUT_PATH);