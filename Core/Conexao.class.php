<?php

require_once 'Config.php';

class Conexao {

    private static $instancia;

    public static function getInstance() {
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new \PDO(DB . ':host=' . DB_HOST . ';dbname=' . DB_NAME
                        , DB_USER
                        , DB_PASS);
            } catch (PDOException $e) {
                echo 'Erro: ' . $e->getCode() . ' - ' . $e->getMessage();
            }
        }
        return self::$instancia;
    }

    public static function select($sql) {

        try {

            if (is_null($sql)) {
                throw new \PDOException("Nao e um sql valido!");
            }

            $pdo = self::getInstance();

            if (!$pdo instanceof \PDO) {
                throw new \PDOException("Nenhuma instância do objeto PDO disponível. Não é possível acessar os métodos.");
            } else {

                $pre = $pdo->prepare($sql);
                $pre->execute();
                $result = $pre->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            echo "Codigo do erro: " . $e->getCode() . ", Erro: " . $e->getMessage();
        }
        $pdo = null;

        return $result;
    }

    public static function insert($array) {
        try {
            if (is_null($array)) {
                throw new \PDOException("Array nao pode ser vazio!");
            } elseif (!is_array($array)) {
                throw new \PDOException("Array invalido");
            }

            $pdo = self::getInstance();

            if (!$pdo instanceof \PDO) {
                throw new \PDOException("Nenhuma instância do objeto PDO disponível. Não é possível acessar os métodos.");
            } else {

                $pdo->beginTransaction();

                try {

                    $sql = 'INSERT INTO ' . $array['table'] . ' (';
                    foreach ($array['values'] as $key => $val) {
                        $sql.= ', ' . $key;
                    }
                    $sql = preg_replace('/, /', '', $sql, 1);
                    $sql.= ') VALUES (';
                    foreach ($array['values'] as $key => $val) {
                        $sql.= ', ?';
                    }
                    $sql.= ')';
                    $sql = preg_replace('/\(, /', '(', $sql, 1);

                    $pre = $pdo->prepare($sql);
                    $k = 1;
                    foreach ($array['values'] as $key => $val) {
                        $pre->bindValue($k++, $val);
                    }

                    $pre->execute();

                    $result = $pre->rowCount();

                    $pdo->commit();
                    
                } catch (\PDOException $e) {
                    $pdo->rollBack();
                    throw $e;
                }
            }

            return $result;
        } catch (\PDOException $e) {
            echo "Codigo do erro: " . $e->getCode() . ", Erro: " . $e->getMessage();
        }
    }

    public static function update($array) {
        try {
            if (is_null($array)) {
                throw new \PDOException("Array nao pode ser vazio!");
            } elseif (!is_array($array)) {
                throw new \PDOException("Array invalido");
            }

            $pdo = self::getInstance();

            if (!$pdo instanceof \PDO) {
                throw new \PDOException("Nenhuma instância do objeto PDO disponível. Não é possível acessar os métodos.");
            } else {

                $pdo->beginTransaction();

                try {

                    $sql = 'UPDATE ' . $array['table'] . ' SET ';

                    foreach ($array['values'] as $key => $val) {
                        $sql.= ', ' . $key . ' = ?';
                    }

                    $sql = preg_replace('/, /', '', $sql, 1);

                    $sql.= ' WHERE ';

                    foreach ($array['where'] as $key => $val) {
                        $sql.= ' AND ' . $key . ' = ?';
                    }

                    $sql = preg_replace('/ AND /', '', $sql, 1);

                    $pre = $pdo->prepare($sql);
                    $k = 1;
                    foreach ($array['values'] as $key => $val) {
                        $pre->bindValue($k++, $val);
                    }
                    $j = $k;
                    foreach ($array['where'] as $key => $val) {
                        $pre->bindValue($j++, $val);
                    }

                    $pre->execute();

                    $result = $pre->rowCount();

                    $pdo->commit();
                } catch (\PDOException $e) {
                    $pdo->rollBack();
                    throw $e;
                }
            }

            return $result;
        } catch (\PDOException $e) {
            echo "Codigo do erro: " . $e->getCode() . ", Erro: " . $e->getMessage();
        }
    }

    public static function delete($array) {
        try {
            if (is_null($array)) {
                throw new \PDOException("Array nao pode ser vazio!");
            } elseif (!is_array($array)) {
                throw new \PDOException("Array invalido");
            }

            $pdo = self::getInstance();

            if (!$pdo instanceof \PDO) {
                throw new \PDOException("Nenhuma instância do objeto PDO disponível. Não é possível acessar os métodos.");
            } else {

                $pdo->beginTransaction();

                try {

                    $sql = 'DELETE FROM ' . $array['table'] . ' WHERE ';
                    foreach ($array['where'] as $key => $val) {
                        $sql.= ' AND ' . $key . ' = ?';
                    }
                    $sql = preg_replace('/ AND /', '', $sql, 1);

                    $pre = $pdo->prepare($sql);
                    $k = 1;
                    foreach ($array['where'] as $key => $val) {
                        $pre->bindValue($k++, $val);
                    }

                    $pre->execute();

                    $result = $pre->rowCount();

                    $pdo->commit();
                } catch (\PDOException $e) {
                    $pdo->rollBack();
                    throw $e;
                }
            }

            return $result;
        } catch (\PDOException $e) {
            echo "Codigo do erro: " . $e->getCode() . ", Erro: " . $e->getMessage();
        }
    }

}
