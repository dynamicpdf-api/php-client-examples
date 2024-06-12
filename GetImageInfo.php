<?php

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/DynamicPdfExamples.php';
use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\ImageInfo;


class GetImageInfo
{
    public static function Run(string $apikey, string $path)
    {
        $imageResource = new ImageResource($path . "dynamicpdfLogo.png");
        $imageInfo = new ImageInfo($imageResource);
        $imageInfo->ApiKey = $apikey;
        $response = $imageInfo->Process();

        if($response->IsSuccessful)
        {
            echo ($response->JsonContent);
        } else {
            echo("Error: ");
            echo($response->StatusCode);
            echo($response->ErrorMessage);
        }
    }
}
#GetImageInfo::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/get-image-info-image-info-endpoint/");

