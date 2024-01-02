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
        $layoutData = new LayoutDataResource($path . "SimpleReportWithCoverPage.json");
        $dlexEndpoint = new DlexLayout("samples/dlex-layout/SimpleReportWithCoverPage.dlex", $layoutData);
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
        $layoutData = new LayoutDataResource($path . "SimpleReportWithCoverPage.json");
        $dlexResource = new DlexResource($path . "SimpleReportWithCoverPage.dlex", "SimpleReportWithCoverPage.dlex");
        $dlexEndpoint = new DlexLayout($dlexResource, $layoutData);
        $dlexEndpoint->AddAdditionalResource($path . "NorthwindLogo.gif", "NorthwindLogo.gif");
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