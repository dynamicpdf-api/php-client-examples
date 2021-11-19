<?php

use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\DlexLayout;
use DynamicPDF\Api\PdfResource;

class SimpleDlexMergeExample
{
    private static string $BasePath = __DIR__;
    public static function RunExample()
    {
        $pdf = new Pdf();
        $layoutData = new LayoutDataResource(SimpleDlexMergeExample::$BasePath . "/Resources/client-libraries-examples/SimpleReportData.json");
        $pdf->AddDlex("samples/shared/dlex/SimpleReportWithCoverPage.dlex", $layoutData);

        $pdfResource = new PdfResource(SimpleDlexMergeExample::$BasePath . "/Resources/client-libraries-examples/DocumentA100.pdf");
        $pdf->AddPdf($pdfResource);

        $response = $pdf->Process();
        file_put_contents(SimpleDlexMergeExample::$BasePath . "./output/simple-dlex-merge-output.pdf", $response->Content);
        echo ("PDF Received: " . SimpleDlexMergeExample::$BasePath . "./output/simple-dlex-merge-output.pdf");
    }
}