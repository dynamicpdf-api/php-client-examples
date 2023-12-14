<?php

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/AddBookmarks.php';
include_once __DIR__ . '/CompletingAcroForm.php';
include_once __DIR__ . '/CreatePdfDlex.php';
include_once __DIR__ . '/DesignerReportTemplate.php';
include_once __DIR__ . '/DlexLayoutExample.php';
include_once __DIR__ . '/DlexLayoutString.php';
include_once __DIR__ . '/ExtractTextExample.php';
include_once __DIR__ . '/GetImageInfo.php';
include_once __DIR__ . "/GettingStartedInFive.php";
include_once __DIR__ . '/HtmlToPdf.php';
include_once __DIR__ . '/ImageInfoExample.php';
include_once __DIR__ . '/MergePdfs.php';
include_once __DIR__ . '/PdfExample.php';
include_once __DIR__ . '/GetPdfInfo.php';
include_once __DIR__ . '/PdfHtmlCssWorkAroundExample.php';
include_once __DIR__ . '/PdfHtmlExample.php';
include_once __DIR__ . '/PdfInfoExample.php';
include_once __DIR__ . '/PdfTextExample.php';
include_once __DIR__ . '/PdfXmpExample.php';
include_once __DIR__ . '/InstructionsExample.php';

class DynamicPdfExamples
{
    public static string $API_KEY = "DP.Tai26vtanTPXDVJz6Y1u0wOYAP6Mv3U/yOUU4wg1+2DtTJuCnCXz7NB1";
    public static string $BASE_PATH = "C:/temp/dynamicpdf-api-samples";
    public static string $USERS_GUIDE_RESOURCE_PATH = "c:/temp/dynamicpdf-api-samples/users-guide-resources";
    public static string $OUTPUT_PATH = "c:/temp/dynamicpdf-api-samples/users-guide-output";

    public static function Run() {

        AddBookmarks::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/add-bookmarks/");
        CompletingAcroForm::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/fill-acro-form-pdf-endpoint/");
        CreatePdfDlex::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/creating-pdf-pdf-endpoint/");
        DesignerReportTemplate::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/creating-a-report-template-designer/");
        DlexLayoutExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/dlex-layout/");
        DlexLayoutString::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/dlex-layout/");
        ExtractTextExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/extract-text-pdf-text-endpoint/");
        GetImageInfo::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/get-image-info-image-info-endpoint/");
        GetPdfInfo::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/get-pdf-info-pdf-info-endpoint/");
        GettingStartedInFive::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/getting-started/");
        HtmlToPdf::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$USERS_GUIDE_RESOURCE_PATH, DynamicPdfExamples::$OUTPUT_PATH. "/");
        ImageInfoExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/image-info/");
        MergePdfs::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/merge-pdfs-pdf-endpoint/");
        PdfExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/pdf-example/");
        PdfHtmlCssWorkAroundExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$USERS_GUIDE_RESOURCE_PATH . "/", DynamicPdfExamples::$OUTPUT_PATH . "/");
        PdfHtmlExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/pdf-html-example/");
        PdfInfoExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/pdf-info/");
        PdfTextExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/extract-text-pdf-text-endpoint/");
        PdfXmpExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/get-xmp-metadata-pdf-xmp-endpoint/");
        InstructionsExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$USERS_GUIDE_RESOURCE_PATH . "/", DynamicPdfExamples::$OUTPUT_PATH . "/");
    }

    public static function recurse_copy($src,$dst) { 
        $dir = opendir($src); 
        @mkdir($dst); 
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) { 
                    DynamicPdfExamples::recurse_copy($src . '/' . $file,$dst . '/' . $file); 
                } 
                else { 
                    copy($src . '/' . $file,$dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir); 
    } 
}
DynamicPdfExamples::recurse_copy(getcwd() . "/Resources/dynamicpdf-api-samples", DynamicPdfExamples::$BASE_PATH);
DynamicPdfExamples::Run();
?>