<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\ImageInfo;

class ImageInfoExample
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-usersguide-examples/";
    private static string $ApiKey = "DP.xxx--apikey--xxx";

    public static function Run(){
       ImageInfoExample::RunOne();
       ImageInfoExample::RunTwo();
    }

    public static function RunOne()
    {
        $imageResource = new ImageResource(ImageInfoExample::$BasePath . "getting-started.png");
        $imageInfo = new ImageInfo($imageResource);
        $imageInfo->ApiKey = ImageInfoExample::$ApiKey;
        $response = $imageInfo->Process();
        echo ($response->JsonContent);
    }

    public static function RunTwo()
    {
        $imageResource = new ImageResource(ImageInfoExample::$BasePath . "multipage.tiff");
        $imageInfo = new ImageInfo($imageResource);
        $imageInfo->ApiKey = ImageInfoExample::$ApiKey;
        $response = $imageInfo->Process();
        echo ($response->JsonContent);
    }
}
ImageInfoExample::Run();