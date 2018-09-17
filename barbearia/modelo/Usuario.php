<?php


class Usuario {

    private $id;
    private $username;
    private $password;

    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

}
