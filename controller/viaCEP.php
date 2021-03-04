<?php

    $conexao = mysqli_connect('localhost', 'root', '', 'salvaCEP');

    //CEP informado pelo usuário//
    $cep = $_POST['cep'];


    //vamos consulta primeiro a nossa base em busca do cep informado
	$query = "SELECT * FROM tb_cep WHERE cep = $cep";
 
    $resultado = mysqli_query($conexao, $query);

    var_dump($query);
 
   /*else{

        //Pesquisando via WEB, endereço completo a partir do CEP//
        $url = "https://viacep.com.br/ws/".$cep."/xml/";

            //Transforma String em Objeto///
            $xml = simplexml_load_file($url);

        //Dados a serem inseridos//
        $logradouro = $xml->logradouro;
        $bairro = $xml->bairro;
        $localidade = $xml->localidade;
        $uf = $xml->uf;

        
        //INSERIR NO BANCO DE DADOS//
        $query = "insert into tb_cep (cep, logradouro, bairro, localidade, uf) values ('{$cep}', '{$logradouro}', '{$bairro}', '{$localidade}', '{$uf}')";

        $conexao = mysqli_connect('localhost', 'root', '', 'salvaCEP');
        mysqli_query($conexao, $query);
        mysqli_close($conexao);

        echo $logradouro."<br>",$bairro."<br>", $localidade."<br>", $uf;
    }*/

?>