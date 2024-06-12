<?php
require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;
use DynamicPDF\Api\DlexResource;
include_once __DIR__ . '/DynamicPdfExamples.php';


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
#DlexLayoutExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/creating-pdf-dlex-layout/", DynamicPdfExamples::$OUTPUT_PATH);