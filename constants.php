<?php
define("CLIENT_EXAMPLES_API_KEY", "DP--api-key--");
define("CLIENT_EXAMPLES_BASE_PATH","./resources/");
define("CLIENT_EXAMPLES_OUTPUT_PATH", "./output/");

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

?>