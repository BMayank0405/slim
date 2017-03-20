<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once __DIR__ . '/../config/config.php';


$app = new \Slim\App;

$app->get('/servicable_pincodes',function(Request $request,Response $response){
  global $db;
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
    echo '{"message": "Invalid Token"}';
  }
});
?>
