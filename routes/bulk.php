<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once __DIR__ . '/../config/config.php';


$app = new \Slim\App;

$app->post('/bulk.php',function(Request $request,Response $response ){
  global $db;
  $data = $request->getParsedBody();
  var_dump($data);
  die();
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
});
?>
