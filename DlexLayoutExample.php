<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

require __DIR__ . '/vendor/autoload.php';
use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;
use DynamicPDF\Api\DlexResource;
include_once("constants.php");


class DlexLayoutExample
{

    public static function Run(string $apikey, string $path, string $output_path){
        DlexLayoutExample::RunCloud($apikey, $path, $output_path);
        DlexLayoutExample::RunLocal($apikey, $path, $output_path);
    }

   public static function RunCloud(string $apikey, string $path, string $output_path)
    {
        $layoutData = new LayoutDataResource($path . "creating-pdf-dlex-layout.json");
        $dlexEndpoint = new DlexLayout("samples/creating-pdf-dlex-layout-endpoint/creating-pdf-dlex-layout.dlex", $layoutData);
        $dlexEndpoint->ApiKey = $apikey;
        $response = $dlexEndpoint->Process();
        if($response->IsSuccessful)
        {
            file_put_contents($output_path . "php-dlex-layout-example-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }  
    }

    public static function RunLocal(string $apikey, string $path, string $output_path)
    {
        $layoutData = new LayoutDataResource($path . "creating-pdf-dlex-layout.json");
        $dlexResource = new DlexResource($path . "creating-pdf-dlex-layout.dlex", "creating-pdf-dlex-layout.dlex");
        $dlexEndpoint = new DlexLayout($dlexResource, $layoutData);
        $dlexEndpoint->AddAdditionalResource($path . "creating-pdf-dlex-layout.png", "creating-pdf-dlex-layout.png");
        $dlexEndpoint->ApiKey = $apikey;
        $response = $dlexEndpoint->Process();
        if($response->IsSuccessful)
        {
            file_put_contents($output_path . "php-dlex-layout-local-example-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }  
    }
}
DlexLayoutExample::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "/creating-pdf-dlex-layout/", CLIENT_EXAMPLES_OUTPUT_PATH);