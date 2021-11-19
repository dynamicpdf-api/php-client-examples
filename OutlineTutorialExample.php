<?php

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;

class OutlineTutorialExample
{
    private static string $BasePath = __DIR__;

	public static function RunExample()
	{
		$pdf = new Pdf();
		$resource = new PdfResource(OutlineTutorialExample::$BasePath . "/Resources/instructions-examples/AllPageElements.pdf");
       
		$input = $pdf->AddPdf($resource);
		$input->Id = "AllPageElements";
		array_push($pdf->Inputs, $input);

		$resource1 = new PdfResource(OutlineTutorialExample::$BasePath . "/Resources/instructions-examples/outline-existing.pdf");
		$input1 = $pdf->AddPdf($resource1);
		$input1->Id = "outlineDoc1";
		array_push($pdf->Inputs, $input1);
		$rootOutline = $pdf->Outlines->Add("Imported Outline");
		$rootOutline->Expanded = true;
		$rootOutline->Children->AddPdfOutlines($input);
		$rootOutline->Children->AddPdfOutlines($input1);

        $pdf->AddPdf($resource);

        $response = $pdf->Process();
        file_put_contents(OutlineTutorialExample::$BasePath . "./output/outline-tutorial-php-output.pdf", $response->Content);
	}
}
