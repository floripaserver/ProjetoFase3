<?php

function requiresQuemSomos(array $var) {
	array_walk($var, create_function('$x', 'require_once("Classes/$x.php");'));
}

// Loading the interface first.
requiresQuemSomos(array(
    'QuemSomos'
    )
);
