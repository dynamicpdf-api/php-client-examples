<?php
// ==============================================================================================
// Author: DynamicPDF.COM CETE
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// PHP file to run all the client examples at once.
// this is a php script that runs each example.
// Each example is a php class of the same name as the file
// where there is a single <classname>::Run line to run the example.
//===============================================================================================

require __DIR__ . '/vendor/autoload.php';

// constants folder contains the api-key
// change to your DynamicPDF API Key

include_once("constants.php");

echo("=========== Running all examples at once. =================================\r\n");

// create output folder if does not exist, otherwise empty output folder pdfs

if (!file_exists(CLIENT_EXAMPLES_OUTPUT_PATH)) {
    mkdir(CLIENT_EXAMPLES_OUTPUT_PATH, 0777, false);
} 
else 
{
    $di = new RecursiveDirectoryIterator("./" . CLIENT_EXAMPLES_OUTPUT_PATH, FilesystemIterator::SKIP_DOTS);
    $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
    foreach ( $ri as $file ) {
        $file->isDir() ?  rmdir($file) : unlink($file);
    }
}

// run all examples, to exclude one simply comment out the include

include_once __DIR__ . '/AddBookmarks.php';
include_once __DIR__ . '/CompletingAcroForm.php';
include_once __DIR__ . '/CreatePdfDlex.php';
include_once __DIR__ . '/DesignerReportTemplate.php';
include_once __DIR__ . '/DlexLayoutExample.php';
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

// This runs all the client examples at once at include time. Note the constants.php file
// runs the command to create the output folder and sets the constants.  The Remainder run 
// by having the <ClassName>::Run after each class definition.

echo "============================== Ran all client examples. =================================================\r\n";
echo "output pdfs\r\n";
echo "========================================================================================================\r\n";
        
foreach (glob("./output/*") as $file) {
    echo $file . "\r\n";
}