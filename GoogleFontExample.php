<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\Font;
include_once("constants.php");
require __DIR__ . '/vendor/autoload.php';

class GoogleFontExample
{
    public static function Run(string $apikey, string $output_path)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;

        $pageInput = $pdf->AddPage();
        $element = new TextElement("Hello", ElementPlacement::TopCenter,150, 250 );
        $element->Color = RgbColor::BlueViolet();
        $font = Font::Google("Anta", false, false);
        $element->Font($font);
        $element->FontSize = 45;
        array_push($pageInput->Elements, $element);
        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            file_put_contents($output_path . "php-google-font-output.pdf", $pdfResponse->Content);
        } else { 
            echo($pdfResponse->ErrorJson);
        }       
    }
}
GoogleFontExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_OUTPUT_PATH);