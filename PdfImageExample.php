<?php
use DynamicPDF\Api\Imaging\PngImageFormat;
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

require __DIR__ . '/vendor/autoload.php';

include_once("constants.php");
use DynamicPDF\Api\imaging\PdfImage;
use DynamicPDF\Api\PdfResource;

class PdfImageExample
{
    public static function Run(string $apikey, string $path, string $outputPath)
    {
        PdfImageExample::Process($apikey, $path . "onepage.pdf", $outputPath . "pdfimage-single-page");
        PdfImageExample::Process($apikey, $path . "pdfnumberedinput.pdf", $outputPath . "pdfimage-multi-page");

    }

    public static function Process(string $apikey, string $path, $outputPath)
    {
        $pdfResource = new PdfResource($path);
        $pdfImage = new PdfImage($pdfResource);
        $pdfImage->ApiKey =$apikey;

        $pdfImage->ImageFormat = new PngImageFormat();

        $response = $pdfImage->Process();

        if ($response->IsSuccessful) {
            echo "the count:" . count($response->Images);
            for ($i = 0; $i < count($response->Images); $i++) {
                $imageData = base64_decode($response->Images[$i]->Data);
                $fileName = $outputPath . $i . ".png";
                file_put_contents($fileName, $imageData);
            }

        } else {
            // Handle error
            echo json_encode($response->ErrorJson) . PHP_EOL;
        }

    }
}
PdfImageExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "pdf-image/", CLIENT_EXAMPLES_OUTPUT_PATH);