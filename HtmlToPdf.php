<?php
use DynamicPDF\Api\HtmlResource;
use DynamicPDF\Api\Pdf;
require __DIR__ . '/vendor/autoload.php';
class HtmlToPdf {

    private static string $BasePath = "C:/temp/html-to-pdf";
    private static string $resource = "C:/temp/html-to-pdf/products.html";
    private static string $ApiKey = "DP.xxx--apikey--xxx";

    public static function Run(){
        $pdf = new Pdf();
        $pdf->ApiKey =HtmlToPdf::$ApiKey;
        $pdf->AddHtml("<html>An example HTML fragment.</html>");
        $pdf->AddHtml("<html><p>HTML with basepath.</p><img src='./images/logo.png'></img></html>", "https://www.dynamicpdf.com");
        $htmlResource = new HtmlResource(HtmlToPdf::$resource);
        $pdf->AddHtml($htmlResource);
        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            echo($pdfResponse->ErrorMessage);
        }
        file_put_contents(HtmlToPdf::$BasePath . "/html-pdf-output-php.pdf", $pdfResponse->Content);

    }
}
HtmlToPdf::Run();