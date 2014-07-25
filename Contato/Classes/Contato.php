<?php

/**
 * Description of Contato
 *
 * @author paulo
 */
class Contato {

    private $nome,
            $email,
            $assunto,
            $mensagem;

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    public function insertContato() {

        $arrayInsert = ['table' => 'contato',
            'values' => [
                'nome' => $this->nome,
                'email' => $this->email,
                'assunto' => $this->assunto,
                'mensagem' => $this->mensagem
        ]];

        $result = Conexao::insert($arrayInsert);

        return $result;
    }

}
