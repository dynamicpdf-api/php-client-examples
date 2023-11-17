<?php

use DynamicPDF\Api\Elements\PageNumberingElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\Font;

require __DIR__ . '/vendor/autoload.php';

class PdfExample
{

    private static string $BasePath = "C:/temp/dynamicpdf-api-usersguide-examples/";
	private static string $ApiKey = "DP.xxx-api-key-xxx";

    public static function Run()
    {
        $pdf = new Pdf();
        $pdf->ApiKey = PdfExample::$ApiKey;
        $pdf->Author = "John Doe";
        $pdf->Title = "My Blank PDF Page";
        $pageInput = $pdf->AddPage(1008, 612);
        $pageNumberingElement = new PageNumberingElement("1", ElementPlacement::TopRight);
        $pageNumberingElement->Color = RgbColor::Red();
        $pageNumberingElement->Font = Font::Courier();
        $pageNumberingElement->FontSize = 24;
        array_push($pageInput->Elements, $pageNumberingElement);
        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            file_put_contents(PdfExample::$BasePath . "php-pdf-example-output.pdf", $pdfResponse->Content);
        } else { 
            echo($pdfResponse->ErrorJson);
        }       
    }
}
PdfExample::Run();