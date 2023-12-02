<html lang="ptbr">
<heade>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    div {
        margin-top: 50px;
    }

    .campo {
        margin: 5px;
        padding: 10px;
        border-radius: 8px;
        width: 250px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .sexo {
        display: inline-block;
        font-size: 14;
        margin: 5px;
        padding: 10px;
        border-radius: 8px;
        width: 95px;
        border: 1px solid #ccc;
        background-color: white;
        flex-direction: row;
        
    }

    a {
        text-decoration: none;
        color: #2196F3;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #45a049;
    }


    select {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 8px;
        border: 1px solid #ccc;
        width: 250px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
        background-color: #4caf50;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 15px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    footer {
        margin-top: 20px;
        text-align: center;
        background-color: #333;
        color: white;
        padding: 10px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    footer h6 {
        margin: 0;
    }

    footer a {
        text-decoration: none;
        color: #fff;
        margin: 0 10px;
    }

    footer a:first-child {
        margin-left: 0;
    }
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="Width=device-width, initial-scale=1.0">
    <title>Aula 17/10/2023</title>
</heade>

<body>
    <div>
        <h1>Cadastro</h1>
        <form method="POST">
            <input type="text" class="campo" name="nome" placeholder="Nome"><br>
            <input type="text" class="campo" name="sobrenome" placeholder="Sobrenome"><br>
            <label><strong>Estado civil</strong></label><br>
            <select class="campo" name="estado_civil">
                <option name="solteiro" value="solteiro">Solteiro</option>
                <option name="casado" value="casado">Casado</option>
                <option name="divorciado" value="divorciado">Divorciado</option>
            </select><br>
            <div class="sexo"> <label><strong>Masculino</strong></label>
                <input type="radio" class="radio" name="sexo" value="Masculino">
            </div>

            <div class="sexo"><label><strong>Feminino</strong></label>
                <input type="radio" class="radio" name="sexo" value="Feminino">
            </div><br>


            <input type="email" class="campo" name="login" placeholder="Login"> <br>
            <input type="password" class="campo" name="senha" placeholder="Senha"> <br>
            <?php

            include("conexao.php");
            error_reporting(0);


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $_nome = $_POST["nome"];
                $_sobrenome = $_POST["sobrenome"];
                $_es_civil = $_POST["estado_civil"];
                $_sexo = $_POST["sexo"];
                $_login = $_POST["login"];
                $_senha = $_POST["senha"];
                $_hash = md5($_senha);
                $_data = date("y-m-d");
                $_query = "insert into tb_login (id, nome, sobrenome, estado_civil, sexo, login, senha, data_de_cadastro) values ('', '$_nome', '$_sobrenome', '$_es_civil', '$_sexo', '$_login', '$_hash', '$_data');";

                if  (empty($_nome) || empty($_sobrenome) || empty($_es_civil) || empty($_sexo) || empty($_login) || empty($_senha)) {
                    echo "<p style='color:#f00; font-weight:bold;'>Preencha os campos corretamente</p>";
                } else {
                    mysqli_query($_conexao, $_query);
                    echo "<p style='color:#4caf50; font-weight:bold;'>Cadastro realizado com sucesso</p>";
                }
            }
            ?>
            <input type="submit" value="Enviar">
            <a href="./listar_cadastro.php">Lista de cadastro</a>
        </form>
    </div>
</body>
<footer>

    <h6> By <strong>Gleidson ferreira</strong> <em>2º ADS</em> </h6>

    <a class="link" href="http://127.0.0.1/aula/"> INICIO</a>

</footer>

</html>