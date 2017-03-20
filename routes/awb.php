<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once __DIR__ . '/../config/config.php';
require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/awb/{awb}',function(Request $request,Response $response,$args){
  global $db;
  $awb = (int)$args['awb'];
  $query = "SELECT * FROM cutomers";
  $result = $db->query($query);
  $count = $result->num_rows;
  if($result){
    while($row = $result->fetch_row()){
      echo json_encode($row);
      echo '<br />';
    }
  }
  else {
    echo '{"message": "Invalid AWB Number"}';
  }
  die();
});

?>
<!doctype html>
<html>
<head>

</head>
<body>
  <form>
    <input type="text"  />
  </form>
</body>
</html>
