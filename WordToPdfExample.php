<?php
use DynamicPDF\Api\WordInput;
use DynamicPDF\Api\WordResource;
use DynamicPDF\Api\Pdf;
include_once("constants.php");
require __DIR__ . '/vendor/autoload.php';
class WordToPdfExample {
    
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

    public static function RunTwo(string $apikey, string $path, string $output_path){

        $pdf = new Pdf();
        $pdf->ApiKey =$apikey;
        $pdf->AddWord(new WordResource($path . "Doc1.docx"));

        $pdfResponse = $pdf->Process();
        
        if($pdfResponse->IsSuccessful)
        {
            echo($pdfResponse->ErrorMessage);
        }
        file_put_contents($output_path . "word-pdf-output-php.pdf", $pdfResponse->Content);

    }
}
WordToPdfExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "word-pdf/", CLIENT_EXAMPLES_OUTPUT_PATH);