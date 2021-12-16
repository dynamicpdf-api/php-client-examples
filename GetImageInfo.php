<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\ImageInfo;

class GetImageInfo
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/get-image-info/";

    public static function Run()
    {
        $imageResource = new ImageResource(GetImageInfo::$BasePath . "dynamicpdfLogo.png");
        $imageInfo = new ImageInfo($imageResource);
        $imageInfo->ApiKey = "DP.NKSoPxiwOgZoypSVYaXyEARo2cO9Kk5BRgY2ZRC0jF/KQq4pDzhfK8yO";
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
