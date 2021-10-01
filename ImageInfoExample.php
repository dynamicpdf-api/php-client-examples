<?php

use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\ImageInfo;

class ImageInfoExample
{
    // simple example from Getting Started - image-info for

    public static function RunExampleOne($baseUrl, $basePath)
    {
        $imageResource = new ImageResource($basePath . "/Resources/client-libraries-examples/getting-started.png");
        $imageInfo = new ImageInfo($imageResource);
        $imageInfo->BaseUrl = $baseUrl;
        $response = $imageInfo->Process();
        echo ($response->JsonContent);
    }

    // simple multi-page tiff example from Users Guide - image-info
    /** @test */
    public static function RunExampleTwo($baseUrl, $basePath)
    {
        $imageResource = new ImageResource($basePath . "/Resources/client-libraries-examples/multipage.tiff");
        $imageInfo = new ImageInfo($imageResource);
        $imageInfo->BaseUrl = $baseUrl;
        $response = $imageInfo->Process();
        echo ($response->JsonContent);
    }
}
