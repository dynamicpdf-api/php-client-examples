<?php
// ========================================================================
// Author: DynamicPDF.COM CETE  www.dynamicpdf.com
// Copyright: (c) 2021 DynamicPDF Cloud API
// License: MIT - for additional information see ./LICENSE in this project.
// Errors: Please report any errors in software to support@dynamicpdf.com
// ========================================================================

define("CLIENT_EXAMPLES_API_KEY", "DP--api-key--");
define("CLIENT_EXAMPLES_BASE_PATH","./resources/");
define("CLIENT_EXAMPLES_OUTPUT_PATH", "./output/");

// ensure the output folder exists, if doesn't create the output folder

if (!file_exists(CLIENT_EXAMPLES_OUTPUT_PATH)) {
    mkdir(CLIENT_EXAMPLES_OUTPUT_PATH, 0777, false);
} 
class Utility {
    public static function GetFileData(string $filePath)
    {
        $length = filesize($filePath);
        $file = fopen($filePath, "r");
        $array = fread($file, $length);
        fclose($file);
        return $array;
    }
}