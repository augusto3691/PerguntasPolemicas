<?php

$link = mysql_connect('localhost', 'root', 'w64c74h41');
mysql_select_db('perguntaspolemicas', $link);


$sql = "SELECT * 
        FROM   users
        WHERE  login = '{$_REQUEST['u']}' and senha = md5('{$_REQUEST['p']}') and ativo = 1 ";

$result = mysql_query($sql);

if (mysql_num_rows($result)) {

    $row = mysql_fetch_assoc($result);


    $response = array(
        "success" => true,
        "error" => array(
            "code" => null,
            "message" => null,
        ),
        "data" => $row
    );
} else {

    $response = array(
        "success" => false,
        "error" => array(
            "code" => "1",
            "message" => "login ou senha inválida",
        ),
        "data" => null
    );
}



header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
echo json_encode($response);





mysql_close($link);
?>