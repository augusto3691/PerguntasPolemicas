<?php

$link = mysql_connect('localhost', 'root', 'w64c74h41');
mysql_select_db('perguntaspolemicas', $link);

$hoje = date("Y-m-d");

$sql = "SELECT * 
        FROM   perguntas
        WHERE  data = '{$hoje}'";



$resultPergunta = mysql_query($sql);

if (mysql_num_rows($resultPergunta)) {

    $rowPergunta = mysql_fetch_assoc($resultPergunta);

    $sql = "SELECT * 
        FROM   respostas
        WHERE  id_pergunta = {$rowPergunta['id']}";

    $resultRespostas = mysql_query($sql);

    $rowRespostas = array();

    while ($row = mysql_fetch_assoc($resultRespostas)) {

        $rowRespostas[] = $row;
    }

    $response = array(
        "success" => true,
        "error" => array(
            "code" => null,
            "message" => null,
        ),
        "data" => array(
            "pergunta" => $rowPergunta,
            "respostas" => $rowRespostas
        )
    );
} else {

    $response = array(
        "success" => false,
        "error" => array(
            "code" => "1",
            "message" => "Nenhuma Pergunta disponível para o dia",
        ),
        "data" => null
    );
}

header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
echo json_encode($response);





mysql_close($link);
?>