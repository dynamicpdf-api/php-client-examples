<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;
include_once("constants.php");
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
DesignerReportTemplate::Run(CLIENT_EXAMPLES_API_KEY, CLIENT_EXAMPLES_BASE_PATH . "creating-a-report-template-designer/", CLIENT_EXAMPLES_OUTPUT_PATH);