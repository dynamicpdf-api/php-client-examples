<?php

use DynamicPDF\Api\Elements\PageNumberingElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\Font;

class PdfExample
{

    public static function RunExample($baseUrl, $basePath)
    {
        $pdf = new Pdf();
        $pdf->BaseUrl = $baseUrl;
        $pdf->Author = "John Doe";
        $pdf->Title = "My Blank PDF Page";
        $pageInput = $pdf->AddPage(1008, 612);
        $pageNumberingElement = new PageNumberingElement("1", ElementPlacement::TopRight);
        $pageNumberingElement->Color = RgbColor::Red();
        $pageNumberingElement->Font = Font::Courier();
        $pageNumberingElement->FontSize = 24;
        array_push($pageInput->Elements, $pageNumberingElement);
        $pdfResponse = $pdf->Process();
        file_put_contents($basePath . "/output/pageExample.pdf", $pdfResponse->Content);
        echo ("PDF Received: " . $basePath . "/output/pageExample.pdf");
    }
}
