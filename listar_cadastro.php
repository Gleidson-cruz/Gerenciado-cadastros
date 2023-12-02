<html lang="pt-br">

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: blue;
        }

        a:hover {
            text-decoration: underline;
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
    <title>Tabela</title>
</head>

<body>
    <table border="1">
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Sobrenome </th>
            <th> Estado civil </th>
            <th> Sexo </th>
            <th> Login </th>
            <th> Senha </th>
            <th> Data </th>
            <th> Status </th>
            <th></th>
            <th></th>


        </tr>

        <?php

        include("conexao.php");

        $_query = "select * from tb_login;";

        $_resultado = mysqli_query($_conexao, $_query) or die("Erro no select");



        while ($_rows = mysqli_fetch_array($_resultado)) { ?>
            <tr>
                <td> <?php echo $_rows["id"]; ?> </td>
                <td> <?php echo $_rows["nome"]; ?> </td>
                <td> <?php echo $_rows["sobrenome"]; ?> </td>
                <td> <?php echo $_rows["estado_civil"]; ?> </td>
                <td> <?php echo $_rows["sexo"]; ?> </td>
                <td> <?php echo $_rows["login"]; ?> </td>
                <td> <?php echo $_rows["senha"]; ?> </td>
                <td> <?php echo str_replace("-", "/", date("d/m/Y", strtotime($_rows["data_de_cadastro"]))); ?> </td>
                <td> <?php if ($_rows["status"] === "ativo") {
                            echo "Ativo";
                        } elseif ($_rows["status"] === "inativo") {
                            echo "Inativo";
                        } ?> </td>

                <td> <a href=editar_usuario.php?id=<?php echo $_rows["id"]; ?>>Editar </a> </td>
                <td><a href="alterar_status.php?id=<?php echo $_rows['id']; ?>&status=<?php echo $_rows['status']; ?>">Alterar Status</a></td>

            </tr>
                        
        <?php
        }
        ?>
    </table>
    <p style="margin-top:20px; text-align:center;"> <a  href="index.php"> Voltar </a></p>
   
</body>
<footer>

    <h6> By <strong>Gleidson ferreira</strong> <em>2º ADS</em> </h6>

    <a href="http://127.0.0.1/aula/"> INICIO</a>

</footer>

</html>