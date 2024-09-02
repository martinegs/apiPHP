<?PHP

require_once("Models/Cliente.php");

switch($_SERVER['REQUEST_METHOD']){
    
case 'GET':
if(isset($_GET['id'])){
    echo json_encode(Cliente::getWhere($_GET['id']));
break;

    }else{
        echo json_encode(Cliente::getAll());
        break;
    }


        default:
break;
case 'POST':
    $datos=json_decode(file_get_contents('php://input'));
    var_dump($datos);
    if($datos!=NULL){
        if (Cliente::Insert($datos->nombre , $datos->ap , $datos->am , $datos->fn , $datos->genero )){
            http_response_code(200);
        }
        else{
            http_response_code(400);
        }
}else{
    http_response_code(405);
}
break;

case 'PUT':
    $datos=json_decode(file_get_contents('php://input'));
    var_dump($datos);
    if($datos!=NULL){
        if (Cliente::Update($datos->id, $datos->nombre , $datos->ap , $datos->am , $datos->fn , $datos->genero )){
            http_response_code(200);
        }
        else{
            http_response_code(400);
        }
}
case 'DELETE':
    if(isset($_GET['id'])){
        if(Cliente::Delete($_GET['id'])){
            http_response_code(200);
        }else{
            http_response_code(400);
        }
    }else{
        http_response_code(405);
    }
    break;
}



?>