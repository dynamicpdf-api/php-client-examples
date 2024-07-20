<?php
use DynamicPDF\Api\ExcelInput;
use DynamicPDF\Api\ExcelResource;
use DynamicPDF\Api\Pdf;
include_once("constants.php");
require __DIR__ . '/vendor/autoload.php';
class ExcelToPdf {
    
    public static function Run(string $apikey, string $path, string $output_path){

        $pdf = new Pdf();
        $pdf->ApiKey =$apikey;
        $pdf->AddExcel(new ExcelResource($path . "sample-data.xlsx"));
        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            echo($pdfResponse->ErrorMessage);
        }
        file_put_contents($output_path . "excel-pdf-output-php.pdf", $pdfResponse->Content);

    }
}
ExcelToPdf::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "/users-guide/", CLIENT_EXAMPLES_OUTPUT_PATH);