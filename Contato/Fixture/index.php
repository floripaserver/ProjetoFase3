<?php

require_once '../../AutoloadCore.php';

/*
 * inserir contato
 */

$arrayInsert = [
    'table' => 'contato',
    'values' => [
        'nome' => 'Paulo',
        'email' => 'paulo@floripaserver.com',
        'assunto' => 'Curso PHP',
        'mensagem' => 'Projeto Fase 3 Curso PHP'
    ]
];

$resultInsert = Conexao::insert($arrayInsert);

if ($resultInsert == 1) {
    $result = 'Contato cadastrado com sucesso!';
} else {
    $result = 'Erro ao cadastrar tente novamente!';
}

echo $result;
