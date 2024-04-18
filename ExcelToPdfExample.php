<?php
use DynamicPDF\Api\ExcelInput;
use DynamicPDF\Api\ExcelResource;
use DynamicPDF\Api\Pdf;
include_once __DIR__ . '/DynamicPdfExamples.php';
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
ExcelToPdf::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/users-guide/", DynamicPdfExamples::$OUTPUT_PATH);