<?php

use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\ImageInfo;

class ImageInfoExample
{
    private static string $BasePath = __DIR__;

    // Simple example from Getting Started - image-info for
    public static function RunExampleOne()
    {
        $imageResource = new ImageResource(ImageInfoExample::$BasePath . "/Resources/client-libraries-examples/getting-started.png");
        $imageInfo = new ImageInfo($imageResource);
        $response = $imageInfo->Process();
        echo ($response->JsonContent);
    }

    // simple multi-page tiff example from Users Guide - image-info
    /** @test */
    public static function RunExampleTwo()
    {
        $imageResource = new ImageResource(ImageInfoExample::$BasePath . "/Resources/client-libraries-examples/multipage.tiff");
        $imageInfo = new ImageInfo($imageResource);
        $response = $imageInfo->Process();
        echo ($response->JsonContent);
    }
}
