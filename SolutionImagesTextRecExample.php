<?php

use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\Elements\ImageElement;
use DynamicPDF\Api\Elements\RectangleElement;
use DynamicPDF\Api\Elements\LineElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\LineStyle;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\Font;
include_once __DIR__ . '/DynamicPdfExamples.php';
require __DIR__ . '/vendor/autoload.php';

class SolutionImagesTextRecExample
{
    public static function Run(string $apikey, string $path, string $outputPath)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;
        $pdf->Author = "John Doe";
        $pdf->Title = "My Blank PDF Page";
        $pageInput = $pdf->AddPage(1008, 612);


        $textElement = new TextElement("Hello PDF", ElementPlacement::TopCenter);
        $textElement->Color = RgbColor::Blue();
        $textElement->FontSize = 42;
        $textElement->XOffset = -50;
        $textElement->YOffset = 100;
        array_push($pageInput->Elements, $textElement);
        
        $element = new LineElement(900, 150, ElementPlacement::TopLeft);
        $element->Color = RgbColor::Red();
        $element->XOffset = 305;
        $element->YOffset = 150;
        $element->LineStyle = LineStyle::Dash();
        $element->Width = 4;
        array_push($pageInput->Elements, $element);
    
       
        
        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            file_put_contents($outputPath . "solution-image-text-rec-example-output.pdf", $pdfResponse->Content);
        } else { 
            echo($pdfResponse->ErrorJson);
        }       
    }
}