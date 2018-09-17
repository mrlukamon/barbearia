<?php


class Cliente {
    private $id;
    private $nome;
    private $fone;
    private $estado_civil_id;
            
    function __construct($nome, $fone, $estado_civil_id) {
        $this->nome = $nome;
        $this->fone = $fone;
        $this->estado_civil_id = $estado_civil_id;
    }
    
    function getEstado_civil_id() {
        return $this->estado_civil_id;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getFone() {
        return $this->fone;
    }

    function setEstado_civil_id($estado_civil_id) {
        $this->estado_civil_id = $estado_civil_id;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setFone($fone) {
        $this->fone = $fone;
    }



}
