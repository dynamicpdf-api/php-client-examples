<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

require __DIR__ . '/vendor/autoload.php';
include_once("constants.php");
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
GetImageInfo::Run(CLIENT_EXAMPLES_API_KEY,CLIENT_EXAMPLES_BASE_PATH . "/get-image-info-image-info-endpoint/");

