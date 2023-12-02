<?php

define("host", "127.0.0.1");
define("usuario", "root");
define("senha", "");
define("db", "BD_PROD");

$_conexao = mysqli_connect(host, usuario, senha, db);
?>