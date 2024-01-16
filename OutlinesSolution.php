<?php

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\PdfResource;
require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/DynamicPdfExamples.php';

class OutlinesSolution
{
    public static function Run(string $apikey, string $path, string $outputPath)
    {
        $pdf = new Pdf();
		$pdf->Author = "John Doe";
		$pdf->Title = "Sample Pdf";
        $pdf->ApiKey =$apikey;

		$pageInput = $pdf->AddPage();
		$element = new TextElement("Hello World 1", ElementPlacement::TopCenter);
		array_push($pageInput->Elements, $element);

		$pageInput1 = $pdf->AddPage();
		$element1 = new TextElement("Hello World 2", ElementPlacement::TopCenter);
		array_push($pageInput1->Elements, $element1);

		$pageInput2 = $pdf->AddPage();
		$element2 = new TextElement("Hello World 3", ElementPlacement::TopCenter);
		array_push($pageInput2->Elements, $element2);

		$rootOutline = $pdf->Outlines->Add("Root Outline");

		$rootOutline->Children->Add("Page 1", $pageInput);
		$rootOutline->Children->Add("Page 2", $pageInput1);
		$rootOutline->Children->Add("Page 3", $pageInput2);

        $inputA = $pdf->AddPdf(new PdfResource($path . "PdfOutlineInput.pdf"));
        
        $rootOutline->Children->AddPdfOutlines($inputA);

        $pdfResponse = $pdf->Process();

        if($pdfResponse->IsSuccessful)
        {
            echo($pdfResponse->ErrorMessage);
        }
        file_put_contents($outputPath . "outlines-output.pdf", $pdfResponse->Content);


    }
}
