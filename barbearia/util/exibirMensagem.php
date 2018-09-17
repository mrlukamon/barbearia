<?php


function mostraAlerta($tipo) {
    if (isset($_SESSION[$tipo])) {

        echo $_SESSION[$tipo];

        unset($_SESSION[$tipo]);
    }
}
