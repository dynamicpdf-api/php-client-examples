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
include_once __DIR__ . '/GoogleFontExample.php';
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
include_once __DIR__ . '/WordToPdfExample.php';
include_once __DIR__ . '/InstructionsExample.php';
include_once __DIR__ . '/SolutionImagesTextRecExample.php';
include_once __DIR__ . '/ImageConversion.php';
include_once __DIR__ . '/PdfBarcode.php';
include_once __DIR__ . '/OutlinesSolution.php';
include_once __DIR__ . '/DeletePages.php';
include_once __DIR__ . '/SplitPdf.php';
include_once __DIR__ . '/FormFlattenDelete.php';
class DynamicPdfExamples
{
    public static string $API_KEY = "DP--api-key--";
    public static string $BASE_PATH = "./resources";
    public static string $OUTPUT_PATH = "./output/";

    public static function Run() {

        if (!file_exists(DynamicPdfExamples::$OUTPUT_PATH)) {
            mkdir(DynamicPdfExamples::$OUTPUT_PATH, 0777, false);
        }
        

        FormFlattenDelete::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/form-field-flatten/", DynamicPdfExamples::$OUTPUT_PATH);

        SplitPdf::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/split-pdf/", DynamicPdfExamples::$OUTPUT_PATH);

        DeletePages::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/delete-pages/", DynamicPdfExamples::$OUTPUT_PATH);

        OutlinesSolution::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/outlines/", DynamicPdfExamples::$OUTPUT_PATH);

        PdfBarcode::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$OUTPUT_PATH);

        ImageConversion::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/image-conversion/", DynamicPdfExamples::$OUTPUT_PATH);
        SolutionImagesTextRecExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/images-text-recs/", DynamicPdfExamples::$OUTPUT_PATH);
        WordToPdf::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/word-pdf/", DynamicPdfExamples::$OUTPUT_PATH);
        AddBookmarks::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/add-bookmarks/", DynamicPdfExamples::$OUTPUT_PATH);
        CompletingAcroForm::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/fill-acro-form-pdf-endpoint/", DynamicPdfExamples::$OUTPUT_PATH);
        CreatePdfDlex::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/creating-pdf-pdf-endpoint/", DynamicPdfExamples::$OUTPUT_PATH);
        DesignerReportTemplate::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/creating-a-report-template-designer/", DynamicPdfExamples::$OUTPUT_PATH);
        DlexLayoutExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/dlex-layout/", DynamicPdfExamples::$OUTPUT_PATH);
        DlexLayoutString::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/dlex-layout/", DynamicPdfExamples::$OUTPUT_PATH);
        ExtractTextExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/extract-text-pdf-text-endpoint/");
        GetImageInfo::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/get-image-info-image-info-endpoint/");
        GetPdfInfo::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/get-pdf-info-pdf-info-endpoint/");
        GettingStartedInFive::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/getting-started/", DynamicPdfExamples::$OUTPUT_PATH);
        GoogleFontExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$OUTPUT_PATH);
        HtmlToPdf::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/users-guide/", DynamicPdfExamples::$OUTPUT_PATH);
        ImageInfoExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/image-info/");
        MergePdfs::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/merge-pdfs-pdf-endpoint/", DynamicPdfExamples::$OUTPUT_PATH);
        PdfExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$OUTPUT_PATH);
        PdfHtmlCssWorkAroundExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/users-guide/", DynamicPdfExamples::$OUTPUT_PATH);
        PdfHtmlExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/users-guide/", DynamicPdfExamples::$OUTPUT_PATH);
        PdfInfoExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/pdf-info/");
        PdfTextExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/extract-text-pdf-text-endpoint/");
        PdfXmpExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/get-xmp-metadata-pdf-xmp-endpoint/");
        InstructionsExample::Run(DynamicPdfExamples::$API_KEY, DynamicPdfExamples::$BASE_PATH . "/users-guide/", DynamicPdfExamples::$OUTPUT_PATH);
    
    }
    
    public static function GetFileData(string $filePath)
    {
        $length = filesize($filePath);
        $file = fopen($filePath, "r");
        $array = fread($file, $length);
        fclose($file);
        return $array;
    }
}
//DynamicPdfExamples::Run();
?>