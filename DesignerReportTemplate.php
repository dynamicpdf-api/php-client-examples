<?php

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;
include_once __DIR__ . '/DynamicPdfExamples.php';
require __DIR__ . '/vendor/autoload.php';

class DesignerReportTemplate
{
   public static function Run(string $apikey, string $path, string $output_path)
    {
        $layoutData = new LayoutDataResource($path . "invoice.json");
        $dlexEndpoint = new DlexLayout("samples/creating-a-report-template-designer/invoice.dlex", $layoutData);
        $dlexEndpoint->ApiKey = $apikey;
        $response = $dlexEndpoint->Process();

        if($response->IsSuccessful)
        {
            file_put_contents($output_path. "invoice-php-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }       
    }
}