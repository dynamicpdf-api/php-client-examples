<?php

require __DIR__ . '/vendor/autoload.php';

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

class GettingStartedInFive
{
    private static string $BasePath = "C:/temp/dynamicpdf-api-samples/";
    public static function Run()
    {
        $layoutData = new LayoutDataResource(GettingStartedInFive::$BasePath . "getting-started.json");
        $dlexEndpoint = new DlexLayout("samples/getting-started/getting-started.dlex", $layoutData);
        $dlexEndpoint->ApiKey = "DP.poEtD7F5tD1Ulp3qPcolUFaCcQFxWOvuNUqm/WragUdOSaAesnu3L6XE";
        $response = $dlexEndpoint->Process();
        file_put_contents(GettingStartedInFive::$BasePath . "getting-started-output.pdf", $response->Content);
    }
}
GettingStartedInFive::Run();