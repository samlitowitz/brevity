<?PHP
  require_once('config.php');
  require_once($brevCfg['lib_path'].'action.lib.php');

  $aOne = new Action("home", $_GET, $brevCfg);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <?PHP
      foreach ($brevCfg['meta_tags'] as $key => $value)
      {
        echo "\n".'    <meta name="'.$key.'" content="'.$value.'">';
      }
      echo "\n";
    ?>
    <?PHP echo $aOne->cClass->getScripts(); ?>
    <?PHP echo $aOne->cClass->getCSS()."\n"; ?>
    <title><?PHP echo $aOne->cClass->getTitle(); ?></title>  
  </head>
  <body>
    <?PHP
      $aOne->Act();
    ?>
  </body>
</html>
