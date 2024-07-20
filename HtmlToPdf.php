<?php
use DynamicPDF\Api\HtmlResource;
use DynamicPDF\Api\Pdf;
include_once("constants.php");
require __DIR__ . '/vendor/autoload.php';
class HtmlToPdf {
    
    public static function Run(string $apikey, string $path, string $output_path){

        $pdf = new Pdf();
        $pdf->ApiKey =$apikey;
        $pdf->AddHtml("<html>An example HTML fragment.</html>");
        $pdf->AddHtml("<html><p>HTML with basepath.</p><img src='./images/logo.png'></img></html>", "https://www.dynamicpdf.com");
        $file =  Utility::GetFileData($path . "products.html");
        $htmlResource = new HtmlResource($file);
        $pdf->AddHtml($htmlResource);
        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            file_put_contents($output_path . "html-pdf-output-php.pdf", $pdfResponse->Content);
        } else {
            echo($pdfResponse->ErrorMessage);
        }       
    }    
}
HtmlToPdf::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "users-guide/", CLIENT_EXAMPLES_OUTPUT_PATH);