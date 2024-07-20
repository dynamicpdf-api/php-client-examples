<?php
require __DIR__ . '/vendor/autoload.php';
include_once("constants.php");
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\ImageInput;
use DynamicPDF\API\Align;
use DynamicPDF\Api\VAlign;

class ImageConversion
{
    public static function Run(string $apikey, string $path, string $outputPath)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;

        $imageResource = new ImageResource($path . "testimage.tif");
        $imageResource2 = new ImageResource($path . "dynamicpdfLogo.png" );

        $imageInput = $pdf->AddImage($imageResource);
        $imageInput2 = $pdf->AddImage($imageResource2);
        
        $imageInput->VAlign = VAlign::Center;
        $imageInput->Align = Align::Center;
        $imageInput->PageHeight = 1008;
        $imageInput->PageWidth = 612;
        $imageInput->ExpandToFit = false;
        
        $imageInput2->VAlign = VAlign::Center;
        $imageInput2->Align = Align::Center;
        $imageInput2->PageHeight = 612;
        $imageInput2->PageWidth = 1008;
        $imageInput2->ExpandToFit = true;
        
        $imageInput->Align = Align::Center;
        $imageInput2->VAlign = VAlign::Top;
       

        $response = $pdf->Process();

        if($response->IsSuccessful)
        {
            file_put_contents($outputPath . "image-conversion-output.pdf", $response->Content);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorJson);
        }
    }
}
ImageConversion::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "image-conversion/", CLIENT_EXAMPLES_OUTPUT_PATH);