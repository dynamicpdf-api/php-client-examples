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

    class InstructionsExample
    {
		public static function TemplateExample($baseUrl,$basePath)
        {
			$pdf = new Pdf();
			$pdf->BaseUrl = $baseUrl;
			$pdf->Author = "John User";
			$pdf->Title = "Template Example One";
			$resource = new PdfResource($basePath . "/Resources/instructions-examples/DocumentA100.pdf");
			$input = new PdfInput($resource);
			array_push($pdf->Inputs,$input);

			$template = new Template("Temp1");
			$element = new TextElement("Hello World", ElementPlacement::TopCenter);
			array_push($template->Elements,$element);
			$input->Template = $template;
			return $pdf;
		}

		public static function MergeOptions($baseUrl,$basePath)
        {
			$cloudResource = "samples/shared/pdf/documentA.pdf";
			$fileResource = $basePath . "/Resources/instructions-examples/documentB.pdf";

			// add pdf from cloud resources

			$pdf = new Pdf();
			$pdf->BaseUrl = $baseUrl;
			$pdf->AddPdf($cloudResource);

			// add pdf from local file path

			$pdfResource = new PdfResource($fileResource);
			$pdf->AddPdf($pdfResource);
			return $pdf;
		}

		public static function MergingExample($baseUrl,$basePath)
		{

			$cloudResource = "samples/shared/pdf/documentA.pdf";
			$fileResource = $basePath . "/Resources/instructions-examples/documentB.pdf";

			// add pdf from cloud resources

			$pdf = new Pdf();
			$pdf->BaseUrl = $baseUrl;
			$pdf->AddPdf($cloudResource);

			// add pdf from local file path

			$pdfResource = new PdfResource($fileResource);
			$pdf->AddPdf($pdfResource);

			// add blank page to pdf

			$pageInput = $pdf->AddPage(1008, 612);

			// add image to pdf from cloud api

			$pdf->AddImage("samples/shared/image/Image3.png");

			// add image to pdf from local file system

			$imageResource = new ImageResource($basePath . "/Resources/instructions-examples/Image1.jpg");
			$pdf->AddImage($imageResource);

			// add dlex to pdf from cloud

			$layoutData = new LayoutDataResource($basePath . "/Resources/instructions-examples/getting-started-data.json");
			//$pdf->AddDlex("samples/getting-started/getting-started.dlex", $layoutData);

			// add dlex to pdf from local

			$dlexResource = new DlexResource($basePath . "/Resources/instructions-examples/example-two.dlex");
			$layoutData = new LayoutDataResource($basePath . "/Resources/instructions-examples/example-two.json");
			$pdf->AddDlex($dlexResource, $layoutData);

			return $pdf;

		}

		public static function AddOutlinesExistingPdf($baseUrl,$basePath)
		{
			$pdf = new Pdf();
			$pdf->BaseUrl = $baseUrl;
			$pdf->Author = "John Doe";
			$pdf->Title = "Existing Pdf Example";

			$resource = new PdfResource($basePath . "Resources/instructions-examples/AllPageElements.pdf");
			$input = $pdf->AddPdf($resource);
			$input->Id = "AllPag=eElements";
			array_push($pdf->Inputs,$input);

			$resource1 = new PdfResource($basePath . "Resources/instructions-examples/outline-existing.pdf");
			$input1 = $pdf->AddPdf($resource1);
			$input1->Id = "outlineDoc1";
			array_push($pdf->Inputs,$input1);

			$rootOutline = $pdf->Outlines->Add("Imported Outline");
			$rootOutline->Expanded = true;

			$rootOutline->Children->AddPdfOutlines($input);
			$rootOutline->Children->AddPdfOutlines($input1);

			return $pdf;

		}

		public static function AddOutlinesForNewPdf($baseUrl,$basePath)
		{
			$pdf = new Pdf();
			$pdf->BaseUrl = $baseUrl;
			$pdf->Author = "John Doe";
			$pdf->Title = "Sample Pdf";

			$pageInput = $pdf->AddPage();
			$element = new TextElement("Hello World 1", ElementPlacement::TopCenter);
			array_push($pageInput->Elements,$element);

			$pageInput1 = $pdf->AddPage();
			$element1 = new TextElement("Hello World 2", ElementPlacement::TopCenter);
			array_push($pageInput1->Elements,$element1);

			$pageInput2 = $pdf->AddPage();
			$element2 = new TextElement("Hello World 3", ElementPlacement::TopCenter);
			array_push($pageInput2->Elements,$element2);

			$rootOutline = $pdf->Outlines->Add("Root Outline");

			$rootOutline->Children->Add("Page 1", $pageInput);
			$rootOutline->Children->Add("Page 2", $pageInput1);
			$rootOutline->Children->Add("Page 3", $pageInput2);

			return $pdf;
		}

		public static function DemoInstructions(array $args)
		{
			$exampleOne = InstructionsExample::topLevelMetaData( $args[1],$args[2]);
			InstructionsExample::printOut($exampleOne,  $args[2], "top-level-metadata.pdf");
			$exampleTwo = InstructionsExample::SecurityExample( $args[1],$args[2]);
			InstructionsExample::printOut($exampleTwo,  $args[2], "security.pdf");
			$exampleThree = InstructionsExample::MergingExample( $args[1],$args[2]);
			InstructionsExample::printOut($exampleThree,  $args[2], "merging.pdf");

			$exampleFour = InstructionsExample::FormFieldsExample( $args[1],$args[2]);
			InstructionsExample::printOut($exampleFour,  $args[2], "fonts.pdf");

			$exampleFive = InstructionsExample::MergeOptions( $args[1],$args[2]);
			InstructionsExample::printOut($exampleFive,  $args[2], "merge-options.pdf");

			$exampleSix = InstructionsExample::AddOutlinesExistingPdf( $args[1],$args[2]);
			InstructionsExample::printOut($exampleSix,  $args[2], "outline-existing.pdf");

			$exampleSeven = InstructionsExample::AddOutlinesForNewPdf( $args[1],$args[2]);
			InstructionsExample::printOut($exampleSeven,  $args[2], "outline-create.pdf");

			$exampleEight = InstructionsExample::BarcodeExample( $args[1],$args[2]);
			InstructionsExample::printOut($exampleEight,  $args[2], "barcode.pdf");

			$exampleNine = InstructionsExample::TemplateExample( $args[1],$args[2]);
			InstructionsExample::printOut($exampleNine,  $args[2], "template.pdf");

		}

		public static function topLevelMetaData($baseUrl,$basePath)
		{

			// create a blank page

			$pdf = new Pdf();
			$pdf->BaseUrl = $baseUrl;
			$pdf->AddPage(1008, 612);

			// top level pdf document metadata

			$pdf->Author = "John Doe";
			$pdf->Keywords ="dynamicpdf api example pdf java instructions";
			$pdf->Creator = "John Creator";
			$pdf->Subject = "topLevel document metadata";
			$pdf->Title = "Sample PDF";

			return $pdf;
		}

		public static function fontsExample($baseUrl,$basePath)
		{

			// create a blank page

			$pdf = new Pdf();
			$pdf->BaseUrl = $baseUrl;
			$pageInput = $pdf->AddPage(1008, 612);
			$pageNumberingElement =	new PageNumberingElement("A", ElementPlacement::TopRight);
			$pageNumberingElement->Color = RgbColor::Red();
			$pageNumberingElement->Font = Font::Helvetica();
			$pageNumberingElement->FontSize = 42;

			$cloudResourceName = "samples/shared/Calibri.otf";

			$pageNumberingElementTwo = new PageNumberingElement("B", ElementPlacement::TopLeft);
			$pageNumberingElementTwo->Color = RgbColor::DarkOrange();
			$pageNumberingElementTwo->Font = new Font($cloudResourceName);
			$pageNumberingElementTwo->FontSize = 32;

			$filePathFont = $basePath . "/Resources/instructions-examples/cnr.otf";
			$pageNumberingElementThree = new PageNumberingElement("C", ElementPlacement::TopCenter);
			$pageNumberingElementThree->Color = RgbColor::Green();
			$pageNumberingElementThree->Font = Font::FromFile($filePathFont);
			$pageNumberingElementThree->FontSize = 42;

			array_push($pageInput->Elements,$pageNumberingElement);
			array_push($pageInput->Elements,$pageNumberingElementTwo);
			array_push($pageInput->Elements,$pageNumberingElementThree);

			return $pdf;
		}

		public static function FormFieldsExample($baseUrl,$basePath)
		{
			$pdf = new Pdf();
			$pdf->BaseUrl = $baseUrl;
			$pdf->AddPdf("samples/shared/simple-form-fill.pdf");

			$formField = new FormField("nameField", "DynamicPdf");
			$formField2 = new FormField("descriptionField", "RealTime Pdf's. Real FAST!");

			array_push($pdf->FormFields,$formField);
			array_push($pdf->FormFields,$formField2);

			return $pdf;
		}

		public static function SecurityExample($baseUrl,$basePath)
		{
			$fileResource = $basePath . "/Resources/instructions-examples/documentB.pdf";
			$userName = "myuser";
			$passWord = "mypassword";
			$pdf = new Pdf();
			$pdf->BaseUrl = $baseUrl;
			$pdfResource = new PdfResource($fileResource);
			$pdf->AddPdf($pdfResource);
			$sec = new Aes256Security($userName, $passWord);
			$sec->AllowCopy = false;
			$sec->AllowPrint = false;
			$pdf->Security = $sec;
			return $pdf;
		}

		public static function BarcodeExample($baseUrl,$basePath)
        {

			$pdf = new Pdf();
			$pdf->BaseUrl = $baseUrl;
			$pdf->Author = "John Doe";
			$pdf->Title = "Barcode Example";

			$resource = new PdfResource($basePath . "/Resources/instructions-examples/DocumentA100.pdf");
			$input = new PdfInput($resource);
			array_push($pdf->Inputs,$input);

			$template = new Template("Temp1");

			$element = new AztecBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 500);
			array_push($template->Elements,$element);
			$input->Template = $template;
			return $pdf;
		}

		public static function printOut(Pdf $pdf, String $basePath, String $outputFile)
		{
			
			$response = $pdf->Process();

			if ($response->ErrorJson != null)
			{
				echo ("\n".$response->ErrorJson);
			}
			else
			{
				echo ("\n".$pdf->GetInstructionsJson());
				echo ("\n"."==================================================================");
				file_put_contents($basePath . "/output/" . $outputFile, $response->Content);
			}
		}

	}
