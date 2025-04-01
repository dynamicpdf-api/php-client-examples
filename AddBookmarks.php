<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\OutlineStyle;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\UrlAction;
include_once("constants.php");

class AddBookmarks
{
	public static function Run(string $apikey, string $path, string $output_path)
	{
		$pdf = new Pdf();
        $pdf->ApiKey = $apikey;

		$resourceA = new PdfResource($path . "DocumentA.pdf");
        $resourceB = new PdfResource($path . "DocumentB.pdf");
        $resourceC = new PdfResource($path . "DocumentC.pdf");

		$inputA = $pdf->AddPdf($resourceA);
		$inputA->Id = "documentA";
		
        $inputB = $pdf->AddPdf($resourceB);
		$inputB->Id = "documentB";       
        
        $inputC = $pdf->AddPdf($resourceC);
		$inputC->Id = "documentC";

        //create a root outline and then add the three documents as children Outline instances

        $rootOutline = $pdf->Outlines->Add("Three Bookmarks");
		$rootOutline->Expanded = true;

		$outlineA = $rootOutline->Children->Add("DocumentA", $inputA);
		$outlineB = $rootOutline->Children->Add("DocumentB", $inputB, 2);

        $rootOutline->Children->Add("DocumentC", $inputC)->Color = RgbColor::Purple();

        //add some color to the outline elements

       $rootOutline->Color = RgbColor::Red();
       $rootOutline->Style = OutlineStyle::BoldItalic;
       $outlineA->Color = RgbColor::Orange();
       $outlineB->Color = RgbColor::Green();
        
  		//add an outline element that links to a URL

        $outlineD = $rootOutline->Children->Add("DynamicPDF Cloud API");
        $outlineD->Color = RgbColor::Blue();
        $outlineD->Action = new UrlAction("https://cloud.dynamicpdf.com");

        $response = $pdf->Process();

        //if successful write to file
        if($response->IsSuccessful)
        {
            file_put_contents($output_path . "add-bookmarks-php-output.pdf", $response->Content);
        } else {
            echo($response->ErrorJson);
        }
    }
}
AddBookmarks::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "/users-guide/", CLIENT_EXAMPLES_OUTPUT_PATH);
    