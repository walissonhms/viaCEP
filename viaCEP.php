<?php

$conexao = mysqli_connect('localhost', 'root', '', 'viacep') or die(mysqli_error());

//CEP informado pelo usuário//
$cep = $_POST['cep'];

//vamos consulta primeiro a nossa base em busca do cep informado
$resultado = mysqli_query($conexao, "SELECT * FROM cep WHERE cep = {$cep}");

if (mysqli_num_rows($resultado) >= 1) {
    while ($linha = mysqli_fetch_array($resultado)) {
        echo "<pre>";
        var_dump($linha['id']);
        var_dump($linha['cep']);
        var_dump($linha['logradouro']);
    }
} else {
    //Pesquisando via WEB, endereço completo a partir do CEP//
    $url = "https://viacep.com.br/ws/{$cep}/xml/";

    //Transforma String em Objeto///
    $xml = simplexml_load_file($url);

    //Dados a serem inseridos//
    $logradouro = $xml->logradouro;
    $bairro = $xml->bairro;
    $localidade = $xml->localidade;
    $uf = $xml->uf;

    //INSERIR NO BANCO DE DADOS//
    $query = "INSERT INTO cep (cep, logradouro, bairro, localidade, uf) VALUES ('{$cep}', '$logradouro', '{$bairro}', '{$localidade}', '{$uf}')";

    $update = mysqli_query($conexao, $query);

    echo $logradouro . "<br>", $bairro . "<br>", $localidade . "<br>", $uf;
}
