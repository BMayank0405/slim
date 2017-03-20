<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once __DIR__ . '/../config/config.php';


$app = new \Slim\App;



/*//to place a new delivery
$app->post('/home',function(Request $request,Response $response){
 echo 'require_once __DIR__ . '/../config/config.php';sucess1';
});

//this is used to cancel delivery request
$app->put('/cancel-order',function(Request $request,Response $response){
echo 'success';
});
*/


//this is used to get details of delivery request
$app->get('/awb/{awb}',function(Request $request,Response $response,$args){
  global $db;
  $awb = (int)$args['awb'];
  $query = "SELECT * FROM cutomers";
  $result = $db->query($query);
//
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

$app->post('/bulk',function(Request $request,Response $response ){
  global $db;
  $data = $request->getBody();
  echo $data;
});
/*
//to get bulk delivery
$app->post('/cancel-order',function(Request $request,Response $response){
echo 'success';
});

//to check if pincodes are servicable
$app->get('/check_serviceable_pincodes[/{pincode}]',function(Request $request,Response $response,$args){
  $pincode = (int)$args['pincode'];
});

//to get list of all servicable pincodes
$app->get('/check_serviceable_pincodes',function(Request $request,Response $response,$args){

});
*/

?>
