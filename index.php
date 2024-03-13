<?php
/*
 * --------- EXAMPLE USAGE ---------
 *
 * @brief PHP class for converting rtf to pdf
 * @version 1.0.0
 * @author Thealgoslingers
 * @twitter @thealgoslingers
 */

require_once "vendor/autoload.php";

use thealgoslingers\RtfToPdf;

/*
 * Go check samples folder
 * a new output.pdf file will be created
 * after running this script
 */
 
## the rtf file path
$rtf_file_path = "samples/sample.rtf";

## path to save the new pdf file 
$path_to_save_output = "samples/output.pdf";

## start converting the rtf file
$rtfpdf = new RtfToPdf($rtf_file_path);

## output the pdf file
$rtfpdf->output($path_to_save_output);
?>