<?php

use DynamicPDF\Api\Elements\PageNumberingElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\Font;

class PdfExample
{
    private static string $BasePath = __DIR__;
    public static function RunExample()
    {
        $pdf = new Pdf();
        $pdf->Author = "John Doe";
        $pdf->Title = "My Blank PDF Page";
        $pageInput = $pdf->AddPage(1008, 612);
        $pageNumberingElement = new PageNumberingElement("1", ElementPlacement::TopRight);
        $pageNumberingElement->Color = RgbColor::Red();
        $pageNumberingElement->Font = Font::Courier();
        $pageNumberingElement->FontSize = 24;
        array_push($pageInput->Elements, $pageNumberingElement);
        $pdfResponse = $pdf->Process();
        file_put_contents(PdfExample::$BasePath . "/output/pageExample.pdf", $pdfResponse->Content);
        echo ("PDF Received: " . PdfExample::$BasePath . "/output/pageExample.pdf");
    }
}
