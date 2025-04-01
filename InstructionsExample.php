<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

use DynamicPDF\Api\Aes256Security;
use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\Template;
use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\Elements\PageNumberingElement;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\Font;
use DynamicPDF\Api\Elements\AztecBarcodeElement;
use DynamicPDF\Api\FormField;
use DynamicPDF\Api\HtmlResource;
include_once("constants.php");
require __DIR__ . '/vendor/autoload.php';

class InstructionsExample
{

	public static function Run(string $apikey, string $path, string $outputpath)
	{
		$exampleOne = InstructionsExample::TopLevelMetaData($path);
		InstructionsExample::printOut($apikey, $exampleOne, $outputpath . "php-top-level-metadata-output.pdf");

		$exampleTwo = InstructionsExample::FontsExample($path);
		InstructionsExample::printOut($apikey, $exampleTwo, $outputpath . "php-font-output.pdf");
	
		$exampleThree = InstructionsExample::SecurityExample($path);
		InstructionsExample::printOut($apikey, $exampleThree, $outputpath . "php-security-output.pdf");

		$exampleFour = InstructionsExample::MergeExample($path);
		InstructionsExample::printOut($apikey, $exampleFour, $outputpath . "php-merge-output.pdf");

		$exampleFive = InstructionsExample::FormFieldsExample($path);
		InstructionsExample::printOut($apikey, $exampleFive, $outputpath . "php-form-fields-output.pdf");

		
		$exampleSix = InstructionsExample::AddOutlinesForNewPdf($path);
		InstructionsExample::printOut($apikey, $exampleSix, $outputpath . "php-outline-create-output.pdf");

		$exampleSeven = InstructionsExample::BarcodeExample($path);
		InstructionsExample::printOut($apikey, $exampleSeven, $outputpath . "php-barcode-output.pdf");

		$exampleEight = InstructionsExample::TemplateExample($path);
		InstructionsExample::printOut($apikey, $exampleEight, $outputpath . "php-template-output.pdf"); 

		$exampleNine = InstructionsExample::AddOutlinesExistingPdf($path);
		InstructionsExample::printOut($apikey, $exampleNine, $outputpath . "php-existing-outline-output.pdf"); 
		
		$exampleTen = InstructionsExample::HtmlToPdf($path);
		InstructionsExample::printOut($apikey, $exampleTen, $outputpath . "html-to-pdf-output.pdf"); 
	}

	public static function printOut(string $apikey, Pdf $pdf, String $outputFile)
	{
		$pdf->ApiKey = $apikey;
		$response = $pdf->Process();
		
		if ($response->ErrorJson != null) {
			echo ("\n" . $response->ErrorJson);
		} else {
			//echo ("\n" . $pdf->GetInstructionsJson());
			//echo ("\n" . "==================================================================");
			file_put_contents($outputFile, $response->Content);
		}
	}

	public static function HtmlToPdf(string $basePath) {

		$pdf = new Pdf();
        $pdf->AddHtml("<html><p>This is a test.</p></html>");

		$file = Utility::GetFileData($basePath . "HtmlWithAllTags.html");
        $resource = new HtmlResource($file);
        $pdf->AddHtml($resource);

        $pdf->AddHtml("<html><img src='./images/logo.png'></img></html>", "https://www.dynamicpdf.com");

		return $pdf;
	}

	public static function TopLevelMetaData(string $basePath)
	{
		// create a blank page

		$pdf = new Pdf();
		$pdf->AddPage(1008, 612);

		// top level pdf document metadata

		$pdf->Author = "John Doe";
		$pdf->Keywords = "dynamicpdf api example pdf java instructions";
		$pdf->Creator = "John Creator";
		$pdf->Subject = "topLevel document metadata";
		$pdf->Title = "Sample PDF";

		return $pdf;
	}

	public static function FontsExample(string $basePath)
	{
		// create a blank page

		$pdf = new Pdf();
		$pageInput = $pdf->AddPage(1008, 612);
		$pageNumberingElement =	new PageNumberingElement("A", ElementPlacement::TopRight);
		$pageNumberingElement->Color = RgbColor::Red();
		$pageNumberingElement->Font(Font::Helvetica());
		$pageNumberingElement->FontSize = 42;

		$cloudResourceName = "samples/users-guide-resources/Calibri.otf";

		$pageNumberingElementTwo = new PageNumberingElement("B", ElementPlacement::TopLeft);
		$pageNumberingElementTwo->Color = RgbColor::DarkOrange();
		$pageNumberingElementTwo->Font(new Font($cloudResourceName));
		$pageNumberingElementTwo->FontSize = 32;
		
		$pageNumberingElementThree = new PageNumberingElement("C", ElementPlacement::TopCenter);
		$pageNumberingElementThree->Color = RgbColor::Green();
		$font = Font::FromFile($basePath . "cnr.otf");
		$pageNumberingElementThree->Font($font);
		$pageNumberingElementThree->FontSize = 42;

		array_push($pageInput->Elements, $pageNumberingElement);
		array_push($pageInput->Elements, $pageNumberingElementTwo);
		array_push($pageInput->Elements, $pageNumberingElementThree);

		return $pdf;
	}

	public static function SecurityExample(string $basePath)
	{
		$fileResource = $basePath . "DocumentB.pdf";
		$userName = "myuser";
		$passWord = "mypassword";
		$pdf = new Pdf();
		$pdfResource = new PdfResource($fileResource);
		$pdf->AddPdf($pdfResource);
		$sec = new Aes256Security($userName, $passWord);
		$sec->AllowCopy = false;
		$sec->AllowPrint = false;
		$pdf->Security = $sec;
		return $pdf;
	}

	public static function MergeExample(string $basePath)
	{
		$pdf = new Pdf();
		$pdf->AddPdf(new PdfResource($basePath . "DocumentA.pdf"));
		$pdf->AddImage(new ImageResource($basePath . "DPDFLogo.png"));
		$pdf->AddPdf(new PdfResource($basePath . "DocumentB.pdf"));
		return $pdf;
	}

	public static function FormFieldsExample(string $basePath)
    {
        $pdf = new Pdf();
        $pdf->AddPdf(new PdfResource($basePath . "simple-form-fill.pdf"));
        $formField = new FormField("nameField", "DynamicPDF");
        $formField2 = new FormField("descriptionField", "DynamicPDF CloudAPI. RealTime PDFs, Real FAST!");
        array_push($pdf->FormFields, $formField);
        array_push($pdf->FormFields, $formField2);
		return $pdf;
    }

	public static function AddOutlinesForNewPdf(string $basePath)
	{
		$pdf = new Pdf();
		$pdf->Author = "John Doe";
		$pdf->Title = "Sample Pdf";

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

		return $pdf;
	}

	public static function AddOutlinesExistingPdf(string $basePath)
	{
		$pdf = new Pdf();
		$pdf->Author = "John Doe";
		$pdf->Title = "Existing Pdf Example";

		$resource = new PdfResource($basePath . "AllPageElements.pdf");
		$input = $pdf->AddPdf($resource);
		$input->Id = "AllPag=eElements";
		array_push($pdf->Inputs, $input);

		$resource1 = new PdfResource($basePath . "OutlineExisting.pdf");
		$input1 = $pdf->AddPdf($resource1);
		$input1->Id = "outlineDoc1";
		array_push($pdf->Inputs, $input1);

		$rootOutline = $pdf->Outlines->Add("Imported Outline");
		$rootOutline->Expanded = true;

		$rootOutline->Children->AddPdfOutlines($input);
		$rootOutline->Children->AddPdfOutlines($input1);

		return $pdf;
	}

	public static function BarcodeExample(string $basePath)
	{
		$pdf = new Pdf();
		$pdf->Author = "John Doe";
		$pdf->Title = "Barcode Example";

		$resource = new PdfResource($basePath . "DocumentA.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Inputs, $input);

		$template = new Template("Temp1");

		$element = new AztecBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 500);
		array_push($template->Elements, $element);
		$input->SetTemplate($template);
		return $pdf;
	}
	
	public static function TemplateExample(string $basePath)
	{
		$pdf = new Pdf();
		$pdf->Author = "John User";
		$pdf->Title = "Template Example One";
		$resource = new PdfResource($basePath . "DocumentA.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Inputs, $input);

		$template = new Template("Temp1");
		$element = new TextElement("Hello World", ElementPlacement::TopCenter);
		array_push($template->Elements, $element);
		$input->SetTemplate($template);
		return $pdf;
	}
}
InstructionsExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "users-guide/", CLIENT_EXAMPLES_OUTPUT_PATH);