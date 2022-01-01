<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\UrlAction;

class AddBookmarks
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/add-bookmarks/";

	public static function Run()
	{
		$pdf = new Pdf();
        $pdf->ApiKey ="DP.xxx--apikey--xxx";

		$resourceA = new PdfResource(AddBookmarks::$BasePath . "DocumentA.pdf");
        $resourceB = new PdfResource(AddBookmarks::$BasePath . "DocumentB.pdf");
        $resourceC = new PdfResource(AddBookmarks::$BasePath . "DocumentC.pdf");

		$inputA = $pdf->AddPdf($resourceA);
		$inputA->Id = "documentA";
		
        $inputB = $pdf->AddPdf($resourceB);
		$inputB->Id = "documentB";       
        
        $inputC = $pdf->AddPdf($resourceC);
		$inputC->Id = "documentC";

        array_push($pdf->Inputs, $inputA);
        array_push($pdf->Inputs, $inputB);
        array_push($pdf->Inputs, $inputC);
        
        //create a root outline and then add the three documents as children Outline instances

        $rootOutline = $pdf->Outlines->Add("Three Bookmarks");
		$rootOutline->Expanded = true;

		$outlineA = $rootOutline->Children->Add("DocumentA", $inputA);
		$outlineB = $rootOutline->Children->Add("DocumentB", $inputB, 2);
        $outlineC = $rootOutline->Children->Add("DocumentC", $inputC);

        //add some color to the outline elements

       $rootOutline->Color = RgbColor::Red();
       $outlineA->Color = RgbColor::Orange();
       $outlineB->Color = RgbColor::Green();
       $outlineA->Color = RgbColor::Purple();
        
  		//add an outline element that links to a URL

        $outlineD = $rootOutline->Children->Add("DynamicPDF Cloud API");
        $outlineD->Color = RgbColor::Blue();
        $outlineD->Action = new UrlAction("https://cloud.dynamicpdf.com");

        $response = $pdf->Process();

        //if successul write to file
        if($response->IsSuccessful)
        {
            file_put_contents(AddBookmarks::$BasePath . "add-bookmarks-output.pdf", $response->Content);
        } else {
            echo($response->ErrorMessage);
        }

    }
}
AddBookmarks::Run();
