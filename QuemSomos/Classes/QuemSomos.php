<?php

/**
 * Description of QuemSomos
 *
 * @author paulo
 */
class QuemSomos {

    public static function insert($table) {
        
    }

    public static function getQuemSomos() {
        $sql = "SELECT * FROM config";

        $select = Conexao::select($sql);
        
        return $select;

    }

}
