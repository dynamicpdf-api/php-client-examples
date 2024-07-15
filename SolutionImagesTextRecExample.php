<?php

use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\Elements\ImageElement;
use DynamicPDF\Api\Elements\RectangleElement;
use DynamicPDF\Api\Elements\LineElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\LineStyle;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\ImageResource;
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
        
        $lineElement = new LineElement(900, 150, ElementPlacement::TopLeft);
        $lineElement->Color = RgbColor::Red();
        $lineElement->XOffset = 305;
        $lineElement->YOffset = 150;
        $lineElement->LineStyle = LineStyle::Dash();
        $lineElement->Width = 4;
        array_push($pageInput->Elements, $lineElement);
    
       
        $recElement = new RectangleElement(100, 500, ElementPlacement::TopCenter);
        $recElement->XOffset = -250;
        $recElement->YOffset = -10;
        $recElement->CornerRadius = 10;
        $recElement->BorderWidth = 5;
        $recElement->BorderStyle = LineStyle::Dots();
        $recElement->BorderColor = RgbColor::Blue();
        $recElement->FillColor = RgbColor::Green();
        array_push($pageInput->Elements, $recElement);
    
        $imgResource = new ImageResource($path . "dynamicpdfLogo.png", "dynamicpdfLogo.png");
        $imageElement = new ImageElement($imgResource, ElementPlacement::TopCenter, 835, 75);
        array_push($pageInput->Elements, $imageElement);

        echo($pdf->GetInstructionsJson(true));
        
        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            file_put_contents($outputPath . "solution-image-text-rec-example-output.pdf", $pdfResponse->Content);
        } else { 
            echo($pdfResponse->ErrorJson);
        }       
    }
}
SolutionImagesTextRecExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/images-text-recs/", DynamicPdfExamples::$OUTPUT_PATH);