<?PHP
class Action 
{
  public $actionDefault;
  public $cClass;

  function __construct($tDefault, $uGet, $brevCfg)
  {
    $this->actionDefault = $tDefault;
    $action = preg_replace('/[^0-9a-z]/', '', strtolower($uGet['action']));
    
    if(!file_exists($brevCfg['page_path'].$action.$brevCfg['page_ext']))
    {
      $action = $this->actionDefault;
    }

    require_once($brevCfg['page_path'].$action.$brevCfg['page_ext']);

    if(class_exists(ucfirst($action)))
    {
      $t = ucfirst($action);
      $this->cClass = new $t($brevCfg, $uGet);
    }
  }

  function __destruct() { }

  public function Act()
  {
    $this->cClass->Display();
  }
}
?>
