<?PHP
abstract class Page
{
  protected $brevCfg;
  protected $pageTheme;
  protected $pageCSS;
  protected $pageScripts;
  protected $uGet;

  abstract public function getTitle();
  abstract public function Display();

  function __construct($brevCfg, $theme, $css, $scripts)
  {
    $this->brevCfg = $brevCfg;
    $this->pageTheme = $theme;
    $this->pageCSS = (is_array($css) ? $this->makeCSS($css) : '');
    $this->pageScripts = (is_array($scripts) ? $this->makeScripts($scripts) : '');
  }

  public function getCSS()
  {
    return ($this->pageCSS);
  }

  public function getScripts()
  {
    return ($this->pageScripts);
  }

  private function makeCSS($css)
  {
    $rVal = '';
    $tmpPath = $this->brevCfg['theme_path'].$this->pageTheme.'/';
    foreach ($css as $value)
    {
      $rVal .= "\n".'    <link rel="stylesheet" href="'.$tmpPath.$value.'" type="text/css">';
    }
    return ($rVal);
  }

  private function makeScripts($scripts)
  {
    $rVal = '';
    foreach ($scripts as $value)
    {
      $rVal .= "\n".'    <script type="text/javascript" src="'.$this->brevCfg['script_path'].$value.'"></script>';
    }
    return ($rVal);
  }
}
?>
