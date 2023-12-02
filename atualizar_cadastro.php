<?php
include("conexao.php");
$_id = $_POST["id"];
$_nome = $_POST["nome"];
$_sobrenome = $_POST["sobrenome"];
$_estado_civil = $_POST["estado_civil"];
$_sexo = $_POST["sexo"];
$_login = $_POST["login"];
$_senha = $_POST["senha"];
$_status = $_POST["status"];
$_data = $_POST["data_de_cadastro"];

$_data_bd = DateTime::createFromFormat('d/m/Y', $_data); //Formata a data para o formato especificado
$_data_bdf= $_data_bd->format('Y-m-d'); //fromata a data para o fromato que o banco de dados espera


if (empty($_senha)) {
    $_query = "UPDATE tb_login SET nome='$_nome', sobrenome =  '$_sobrenome', estado_civil = '$_estado_civil', sexo = '$_sexo',
    login = '$_login', status ='$_status', data_de_cadastro = '$_data_bdf' WHERE id= $_id ;";
} else {
    $_query = "UPDATE tb_login SET nome='$_nome', sobrenome =  '$_sobrenome', estado_civil = '$_estado_civil', sexo = '$_sexo',
login = '$_login', senha= md5('$_senha'), status ='$_status', data_de_cadastro = '$_data_bdf' WHERE id= $_id ;";
}

$_resultado = mysqli_query($_conexao, $_query) or die("Erro ao atualizar Cadastro");

if ($_resultado) {
    echo "<h1 style='text-align:center; color:#4caf50; margin-top:20px;' >Cadastro atualizado com sucesso!</h1>";
    echo " <p style='text-align:center; color:#333; margin-top:10px;'>Você será redirecionado Automaticamente.</p>";
    header("refresh:3; listar_cadastro.php");
    exit();
} else {
    echo "Atualização mal sucedida";
    header("refresh: 3; url=editar_usuario.php");
}
?>