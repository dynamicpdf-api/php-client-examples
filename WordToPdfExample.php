<?php
use DynamicPDF\Api\WordInput;
use DynamicPDF\Api\WordResource;
use DynamicPDF\Api\Pdf;
include_once __DIR__ . '/DynamicPdfExamples.php';
require __DIR__ . '/vendor/autoload.php';
class WordToPdf {
    
    public static function Run(string $apikey, string $path, string $output_path){

        $pdf = new Pdf();
        $pdf->ApiKey =$apikey;
        $wordResource = new WordResource($path . "Doc1.docx");
        $wordInput = new WordInput($wordResource);
        
        array_push($pdf->Inputs, $wordInput);

        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            echo($pdfResponse->ErrorMessage);
        }
        file_put_contents($output_path . "word-pdf-output-php.pdf", $pdfResponse->Content);

    }
}