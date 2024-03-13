<?php
/*
 * @brief PHP class for converting rtf to pdf
 * @version 1.0.0
 * @author Thealgoslingers
 * @twitter @thealgoslingers
 * @var string $rtfFilePath the path to the rtf file
 * @var string $name/path to where the converted rtf to pdf should be saved to
 *
 * the index.php file contains example usage 
 */

namespace thealgoslingers;

/*
 * Load Document parse
 * load html parser
 */
use RtfHtmlPhp\Document;
use RtfHtmlPhp\Html\HtmlFormatter;
use TCPDF;

/*
 @class RtfToPdf 
 */
class RtfToPdf
{
  /*
<?php
/*
 * @brief PHP class for converting rtf to pdf
 * @version 1.0.0
 * @author Thealgoslingers
 * @twitter @thealgoslingers
 * @var string $rtfFilePath the path to the rtf file
 * @var string $name/path to where the converted rtf to pdf should be saved to
 *
 * the index.php file contains example usage 
 */

namespace thealgoslingers;

/*
 * Load Document parse
 * load html parser
 */
use RtfHtmlPhp\Document;
use RtfHtmlPhp\Html\HtmlFormatter;
use TCPDF;

/*
 @class RtfToPdf 
 */
class RtfToPdf
{
  /*
   * path to rtf file
   */
  protected $rtfFilePath;

  /*
   * path where to save the pdf file
   */
  protected $outputPdfPath;

  /*
   * constructor
   */
  public function __construct($rtfFilePath)
  {
    $this->rtf_file = $rtfFilePath;

    /*
     * parse the rtf file as document
     */
    self::parse();
  }
  private function parse()
  {
    self::toDOC();
  }
  private function toDOC()
  {
    /*
     * chech if rtf file exists
     */
    if (!file_exists($this->rtf_file)) {
      die(
        "The rtf file could not be found. Make sure you supplied the correct path to the rtf file."
      );
    }
    $this->rtf = file_get_contents($this->rtf_file);
    $this->doc = new Document($this->rtf);
    self::toHTML();
  }
  private function toHTML()
  {
    /*
     * format Document as html
     */
    $formatter = new HtmlFormatter();

    $this->html = $formatter->Format($this->doc);
    self::toPDF();
  }
  private function toPDF()
  {
    /*
     * Generate PDF from HTML
     */
    $this->pdf = new TCPDF("P", "mm", "A4", true, "UTF-8", false);
    $this->pdf->SetMargins(15, 15, 15);
    $this->pdf->AddPage();
    $this->pdf->writeHTML($this->html, true, false, true, false, "");
  }
  public function output($outputPdfPath)
  {
    /*
     * saving pdf file process start
     * use fopen function to create the file
     * if not file exists
     */
    $file = fopen($outputPdfPath, "w");
    /*
     * write the pdf file to
     * the new output file
     */
    $pdfstring = $this->pdf->Output($this->savedir, "S");
    fwrite($file, $pdfstring);
    fclose($file);
    /* End of saving pdf file process */
  }
}
?>
