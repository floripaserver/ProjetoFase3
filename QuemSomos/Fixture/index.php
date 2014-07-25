<?php

require_once '../../AutoloadCore.php';

/*
 * inserir quem somos
 */

$arrayInsert = [
    'table' => 'config',
    'values' => [
        'titulo_quem_somos' => 'Curso PHP',
        'descricao_quem_somos' => 'A nossa empresa e destinada ao estudo e desenvolvimento de software para gerenciamento.'
    ]
];

$resultInsert = Conexao::insert($arrayInsert);

if ($resultInsert == 1) {
    $result = 'Quem somos cadastrado com sucesso!';
} else {
    $result = 'Erro ao cadastrar tente novamente!';
}

echo $result;
