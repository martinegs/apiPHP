<?php
include_once "Connection/Connection.php";
class Cliente {
    public static function getAll(){
        $db= new Connection();
        $query=("SELECT *From clientes");
        $resultado=$db->query($query);
        $datos=[];
        if($resultado->num_rows){
        while($row= $resultado->fetch_assoc()){
            $datos[] = [
                'id'=>$row['id'],
                'nombre'=>$row['nombre'],
                'ap'=>$row['ap'],
                'am'=>$row['am'],
                'fn'=>$row['fn'],
                'genero'=>$row['genero']
            ];
        }
        return $datos;
    }
}

public static function getWhere($id_cliente){
    $db= new Connection();
    $query=("SELECT *From clientes where id=$id_cliente");
    $resultado=$db->query($query);
    $datos=[];
    if($resultado->num_rows){
    while($row= $resultado->fetch_assoc()){
        $datos[] = [
            'id'=>$row['id'],
            'nombre'=>$row['nombre'],
            'ap'=>$row['ap'],
            'am'=>$row['am'],
            'fn'=>$row['fn'],
            'genero'=>$row['genero']
        ];
        return $datos;
    }
    return $datos;
}
}

public static function Insert($nombre, $ap, $am, $fn, $genero){
    $db = new Connection();
    $query = "INSERT INTO clientes(nombre, ap, am, fn, genero) VALUES ('$nombre', '$ap', '$am', '$fn', '$genero')";
    if ($db->query($query)) {
        return true;
    } else {
        error_log("Error en la inserción: " . $db->error);
        return false;
    }
}


public static function Update($id_cliente, $nombre, $ap, $am, $fn, $genero){
    $db=new Connection();
    $query="Update clientes set nombre='".$nombre."',ap='".$ap."',am='".$am."',fn='".$fn."',genero='".$genero."' where id=$id_cliente" ;
    $db->query($query);
    if($db->affected_rows){
        return True;
    }else{
    return False;
}
}

public static function Delete($id_cliente){
    $db=new Connection();
    $query="Delete from clientes where id=$id_cliente";
    $db->query($query);

    if($db->affected_rows){
        return True;
    }else{ return False;}
}





}


?>