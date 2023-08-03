<?php

use DynamicPDF\Api\HtmlResource;
use DynamicPDF\Api\Pdf;

require __DIR__ . '/vendor/autoload.php';

class PdfHtmlExample
{

    private static string $BasePath = "C:/temp/html-to-pdf/";
    private static string $resource = "c:/temp/html-to-pdf/products.html";
	private static string $ApiKey = "DP.xxx--apikey--xxx";

    public static function Run()
    {
        $pdf = new Pdf();
        $pdf->ApiKey = PdfHtmlExample::$ApiKey;


       $pdf->AddHtml("<html>An example HTML fragment.</html>");

       $pdf->AddHtml("<html><p>HTML with basePath.</p><img src='./images/logo.png'>", "https://www.dynamicpdf.com");

       $htmlResource = new HtmlResource(PdfHtmlExample::$resource);

        $pdf->AddHtml($htmlResource);



        $pdfResponse = $pdf->Process();
        
        if($pdfResponse->IsSuccessful == false)
        {
            echo($pdfResponse->ErrorMessage);
        }

        file_put_contents(PdfHtmlExample::$BasePath . "php-pdf-example-output.pdf", $pdfResponse->Content);
    }
}
PdfHtmlExample::Run();