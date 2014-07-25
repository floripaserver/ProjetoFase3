<?php

require_once '../AutoloadCore.php';
//echo '<br>teste';

$arrayInsert= ['table' => 'pessoa', 'values' => [
        'nome' => 'Luciane e Paulo',
        'fone' => '88888888'
        ]];
echo Conexao::insert($arrayInsert);

echo '<br><br>';

$sql = "SELECT * FROM pessoa";

$select = Conexao::select($sql);

//percorre os resultados via o laço foreach
foreach ($select as $item) {
//exibe o resultado
    echo "Nome: " . $item['nome'] . " - " . $item['fone'] . "<br>\n";
}

echo '<br><br>';

$arrayUpdate = ['table' => 'pessoa',
    'values' => [
        'nome' => 'Luciane Berner',
        'fone' => '84647208'
    ],
    'where' => [
        'nome' => 'Luciane',
        'fone'=>'88888888'
        ]];

//echo '<br>update: ' . Conexao::update($arrayUpdate);

echo '<br><br>';

$arrayDelete = ['table'=>'pessoa',
        'where'=>[
            'nome'=>'Bruno',
            'fone'=>'88888888'
        ]];

echo '<br>delete: '.  Conexao::delete($arrayDelete);


//echo '<br>teste2';
/* $conn = Conexao::getInstance();
  $result = $conn->query("SELECT * FROM pessoa");
  if($result){
  //percorre os resultados via o laço foreach
  foreach($result as $item){
  //exibe o resultado
  echo "Nome: ".$item['nome'] . " - " . $item['fone'] ."<br>\n";
  }
  }
 */
require_once 'AutoloadQuemSomos.php';

//echo '<br>diretorio '.__DIR__;
//$r = new QuemSomos();
//echo '<br>ss'.$r->conn;
//echo QuemSomos::insert();

