<?php

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/DynamicPdfExamples.php';
use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\ImageInfo;

class ImageInfoExample
{
    public static function Run(string $apikey, string $path){
       ImageInfoExample::RunOne($apikey, $path);
       ImageInfoExample::RunTwo($apikey, $path);
    }

    public static function RunOne(string $apikey, string $path)
    {
        $imageResource = new ImageResource($path . "getting-started.png");
        $imageInfo = new ImageInfo($imageResource);
        $imageInfo->ApiKey = $apikey;
        $response = $imageInfo->Process();
        echo ($response->JsonContent);
    }

    public static function RunTwo(string $apikey, string $path)
    {
        $imageResource = new ImageResource($path . "multipage.tiff");
        $imageInfo = new ImageInfo($imageResource);
        $imageInfo->ApiKey = $apikey;
        $response = $imageInfo->Process();
        echo ($response->JsonContent);
    }
}