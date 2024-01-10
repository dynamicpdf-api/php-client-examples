<?php

use DynamicPDF\Api\Elements\Code11BarcodeElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\Font;
include_once __DIR__ . '/DynamicPdfExamples.php';
require __DIR__ . '/vendor/autoload.php';

class PdfBarcode
{
    public static function Run(string $apikey, string $path)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;
        $pdf->Author = "John Doe";
        $pdf->Title = "My Blank PDF Page";
        $pageInput = $pdf->AddPage(1008, 612);
        $code11BarcodeElement = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 200, 50, 50);
        $code11BarcodeElement->Color = RgbColor::Red();
 
        array_push($pageInput->Elements, $code11BarcodeElement);
        $pdfResponse = $pdf->Process();
 
        if($pdfResponse->IsSuccessful)
        {
            file_put_contents($path . "barcode-pdf-output.pdf", $pdfResponse->Content);
        } else { 
            echo($pdfResponse->ErrorJson);
        }       
    }
}