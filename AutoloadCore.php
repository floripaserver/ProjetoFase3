<?php

function requiresCore(array $var) {
	array_walk($var, create_function('$x', 'require_once("Core/$x.class.php");'));
}

// Loading the interface first.
requiresCore(array(
    'Conexao',
    'Rotas'
    )
);
