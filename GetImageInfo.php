<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\ImageInfo;

// https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/image-info/tutorial-image-info

class GetImageInfo
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/get-image-info/";

    public static function Run()
    {
        $imageResource = new ImageResource(GetImageInfo::$BasePath . "dynamicpdfLogo.png");
        $imageInfo = new ImageInfo($imageResource);
        $imageInfo->ApiKey = "DP.xxx-api-key-xxx";
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
GetImageInfo::Run();
