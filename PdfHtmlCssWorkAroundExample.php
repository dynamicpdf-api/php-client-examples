<?php
use DynamicPDF\Api\HtmlResource;
use DynamicPDF\Api\Pdf;
use DynamicPDF\API\PageSize;
use DynamicPDF\API\PageOrientation;
require __DIR__ . '/vendor/autoload.php';
class PdfHtmlCssWorkAroundExample {

    private static string $BasePath = "C:/temp/users-guide-resources/";
 
    private static string $OutPath = "C:/temp/dynamicpdf-api-usersguide-examples/php-output/";

    private static string $ApiKey = "DP.xxx-api-key-xxx";

    public static function Run(){
        $pdf = new Pdf();
        $pdf->ApiKey =PdfHtmlCssWorkAroundExample::$ApiKey;

        $tempHtml = file_get_contents(PdfHtmlCssWorkAroundExample::$BasePath . "example.html");
        $tempCss = file_get_contents(PdfHtmlCssWorkAroundExample::$BasePath . "example.css");
        
        $sb = substr($tempHtml, 0, strpos($tempHtml,"<link"));
        $sb = $sb . "<style>" . $tempCss . "</style>";
        
        $tempHtml = substr($tempHtml, strpos($tempHtml, "<link"));
        $sb = $sb . substr($tempHtml, strpos($tempHtml, "/>") + 2);
        
        $resource = new HtmlResource($sb);
          
        $pdf->AddHtml($resource, null, "Letter", "Portrait", 1);

        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            echo($pdfResponse->ErrorMessage);
        }
        file_put_contents(PdfHtmlCssWorkAroundExample::$OutPath . "/workaround-html-pdf-output-php.pdf", $pdfResponse->Content);

    }
}
PdfHtmlCssWorkAroundExample::Run();