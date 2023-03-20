<?php

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

require __DIR__ . '/vendor/autoload.php';

class DesignerReportTemplate
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/using-dlex-layout/";
    private static string $ApiKey = "DP.xxx-api-key-xxx";

    public static function Run()
    {
        $layoutData = new LayoutDataResource(DesignerReportTemplate::$BasePath . "invoice-local.json");
        $dlexEndpoint = new DlexLayout("samples/creating-a-report-template-designer/invoice.dlex", $layoutData);
        $dlexEndpoint->ApiKey = DesignerReportTemplate::$ApiKey;
        $response = $dlexEndpoint->Process();
        if($response->IsSuccessful)
        {
            file_put_contents(DesignerReportTemplate::$BasePath . "invoice-php-output.pdf", $response->Content);
        } else { 
            echo($response->ErrorJson);
        }       
    }
}
DesignerReportTemplate::Run();