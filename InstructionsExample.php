<?php

use DynamicPDF\Api\Aes256Security;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\Template;
use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexResource;

use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\Elements\PageNumberingElement;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\Font;
use DynamicPDF\Api\Elements\AztecBarcodeElement;
use DynamicPDF\Api\FormField;
use DynamicPDF\Api\PdfText;

require __DIR__ . '/vendor/autoload.php';

class InstructionsExample
{
	private static string $BasePath = "C:/temp/dynamicpdf-api-usersguide-examples/";
	private static string $ApiKey = "DP.xxx--apikey--xxx";


	public static function Run()
	{
		$exampleOne = InstructionsExample::TopLevelMetaData();
		InstructionsExample::printOut($exampleOne, "php-top-level-metadata-output.pdf");

		$exampleTwo = InstructionsExample::FontsExample();
		InstructionsExample::printOut($exampleTwo, "php-php-font-output.pdf");
	
		$exampleThree = InstructionsExample::SecurityExample();
		InstructionsExample::printOut($exampleThree, "php-security-output.pdf");

		$exampleFour = InstructionsExample::MergeExample();
		InstructionsExample::printOut($exampleFour, "php-merge-output.pdf");

		$exampleFive = InstructionsExample::FormFieldsExample();
		InstructionsExample::printOut($exampleFive, "php-form-fields-output.pdf");

		
		$exampleSix = InstructionsExample::AddOutlinesForNewPdf();
		InstructionsExample::printOut($exampleSix, "php-outline-create-output.pdf");

		$exampleSeven = InstructionsExample::BarcodeExample();
		InstructionsExample::printOut($exampleSeven, "php-barcode-output.pdf");

		$exampleEight = InstructionsExample::TemplateExample();
		InstructionsExample::printOut($exampleEight, "php-template-output.pdf"); 

		$exampleNine = InstructionsExample::AddOutlinesExistingPdf();
		InstructionsExample::printOut($exampleNine, "php-existing-outline-output.pdf"); 
		
	}

	public static function printOut(Pdf $pdf, String $outputFile)
	{
		$pdf->ApiKey = InstructionsExample::$ApiKey;
		$response = $pdf->Process();

		if ($response->ErrorJson != null) {
			echo ("\n" . $response->ErrorJson);
		} else {
			echo ("\n" . $pdf->GetInstructionsJson());
			echo ("\n" . "==================================================================");
			file_put_contents(InstructionsExample::$BasePath .  $outputFile, $response->Content);
		}
	}


	public static function TopLevelMetaData()
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

	public static function FontsExample()
	{
		// create a blank page

		$pdf = new Pdf();
		$pageInput = $pdf->AddPage(1008, 612);
		$pageNumberingElement =	new PageNumberingElement("A", ElementPlacement::TopRight);
		$pageNumberingElement->Color = RgbColor::Red();
		$pageNumberingElement->Font = Font::Helvetica();
		$pageNumberingElement->FontSize = 42;

		$cloudResourceName = "old_samples/shared/font/Calibri.otf";

		$pageNumberingElementTwo = new PageNumberingElement("B", ElementPlacement::TopLeft);
		$pageNumberingElementTwo->Color = RgbColor::DarkOrange();
		$pageNumberingElementTwo->Font = new Font($cloudResourceName);
		$pageNumberingElementTwo->FontSize = 32;

		$filePathFont = InstructionsExample::$BasePath . "cnr.otf";
		$pageNumberingElementThree = new PageNumberingElement("C", ElementPlacement::TopCenter);
		$pageNumberingElementThree->Color = RgbColor::Green();
		$pageNumberingElementThree->Font = Font::FromFile($filePathFont);
		$pageNumberingElementThree->FontSize = 42;

		array_push($pageInput->Elements, $pageNumberingElement);
		array_push($pageInput->Elements, $pageNumberingElementTwo);
		array_push($pageInput->Elements, $pageNumberingElementThree);

		return $pdf;
	}

	public static function SecurityExample()
	{
		$fileResource = InstructionsExample::$BasePath . "DocumentB.pdf";
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

	public static function MergeExample()
	{
		$pdf = new Pdf();
		$pdf->AddPdf(InstructionsExample::$BasePath . "DocumentA.pdf");
		$pdf->AddImage(InstructionsExample::$BasePath . "dynamicpdfLogo.png");
		$pdf->AddPdf(InstructionsExample::$BasePath . "DocumentB.pdf");
		return $pdf;
	}

	public static function FormFieldsExample()
    {
        $pdf = new Pdf();
        $pdf->AddPdf("samples/shared/pdf/simple-form-fill.pdf");
        $formField = new FormField("nameField", "DynamicPDF");
        $formField2 = new FormField("descriptionField", "DynamicPDF CloudAPI. RealTime PDFs, Real FAST!");
        array_push($pdf->FormFields, $formField);
        array_push($pdf->FormFields, $formField2);
		return $pdf;
    }

	public static function AddOutlinesForNewPdf()
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

	public static function AddOutlinesExistingPdf()
	{
		$pdf = new Pdf();
		$pdf->Author = "John Doe";
		$pdf->Title = "Existing Pdf Example";

		$resource = new PdfResource(InstructionsExample::$BasePath . "AllPageElements.pdf");
		$input = $pdf->AddPdf($resource);
		$input->Id = "AllPag=eElements";
		array_push($pdf->Inputs, $input);

		$resource1 = new PdfResource(InstructionsExample::$BasePath . "OutlineExisting.pdf");
		$input1 = $pdf->AddPdf($resource1);
		$input1->Id = "outlineDoc1";
		array_push($pdf->Inputs, $input1);

		$rootOutline = $pdf->Outlines->Add("Imported Outline");
		$rootOutline->Expanded = true;

		$rootOutline->Children->AddPdfOutlines($input);
		$rootOutline->Children->AddPdfOutlines($input1);

		return $pdf;
	}

	public static function BarcodeExample()
	{
		$pdf = new Pdf();
		$pdf->Author = "John Doe";
		$pdf->Title = "Barcode Example";

		$resource = new PdfResource(InstructionsExample::$BasePath . "DocumentA.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Inputs, $input);

		$template = new Template("Temp1");

		$element = new AztecBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 500);
		array_push($template->Elements, $element);
		$input->Template = $template;
		return $pdf;
	}
	
	public static function TemplateExample()
	{
		$pdf = new Pdf();
		$pdf->Author = "John User";
		$pdf->Title = "Template Example One";
		$resource = new PdfResource(InstructionsExample::$BasePath . "DocumentA.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Inputs, $input);

		$template = new Template("Temp1");
		$element = new TextElement("Hello World", ElementPlacement::TopCenter);
		array_push($template->Elements, $element);
		$input->Template = $template;
		return $pdf;
	}

}
InstructionsExample::Run();
