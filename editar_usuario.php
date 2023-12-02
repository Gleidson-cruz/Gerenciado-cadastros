<html lang="pt-br">

<head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            height: 35px;
        }

        label {
            font-weight: bold;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        strong {
            margin-right: 5px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }
    </style>
    <title>Formulário de Atualização</title>
</head>

<body>
    <?php
    include("conexao.php");

    if (isset($_GET['id'])) {
        $_id = $_GET['id'];

        $_query = "SELECT * FROM tb_login WHERE id = $_id";
        $_resultado = mysqli_query($_conexao, $_query);

        if ($_resultado->num_rows > 0) {
            $_row = $_resultado->fetch_assoc();

            echo "<form action='atualizar_cadastro.php' method='POST'>
                    <input type='hidden' name='id' value='" . $_row['id'] . "'>
                    Nome: <input type='text' name='nome' value='" . $_row['nome'] . "'><br>
                    Sobrenome: <input type='text' name='sobrenome' value='" . $_row['sobrenome'] . "'><br>
                    <label>Estado civil</label>
                    <select name='estado_civil'>";

            if ($_row["estado_civil"] == "solteiro") {
                echo "<option value='solteiro' selected>Solteiro</option>
                      <option value='casado'>Casado</option>
                      <option value='divorciado'>Divorciado</option>";
            } elseif ($_row["estado_civil"] == "casado") {
                echo "<option value='solteiro'>Solteiro</option>
                      <option value='casado' selected>Casado</option>
                      <option value='divorciado'>Divorciado</option>";
            } elseif ($_row["estado_civil"] == "divorciado") {
                echo "<option value='solteiro'>Solteiro</option>
                      <option value='casado'>Casado</option>
                      <option value='divorciado' selected>Divorciado</option>";
            }

            echo "</select><br>";

            if ($_row['sexo'] === "Masc") {
                echo "<strong>Masculino</strong>
                      <input type='radio' name='sexo' value='Masculino' checked><br>
                      <strong>Feminino</strong>
                      <input type='radio' name='sexo' value='Feminino'><br>";
            } else {
                echo "<strong>Masculino</strong>
                      <input type='radio' name='sexo' value='Masculino'><br>
                      <strong>Feminino</strong>
                      <input type='radio' name='sexo' value='Feminino' checked><br>";
            }

            echo "Login: <input type='text' name='login' value='" . $_row['login'] . "'><br>
                  Senha: <input type='password' name='senha' placeholder='**********'><br>";

            $_data_dmy = str_replace('-', '/', date('d/m/Y', strtotime($_row['data_de_cadastro'])));
            echo  "Data de cadastro: <input type='text' name='data_de_cadastro' value='" . $_data_dmy . "'><br>
                   <label>Status</label>
                   <select name='status'>";

            if ($_row["status"] == "ativo") {
                echo "<option value='ativo' selected>Ativo</option>
                      <option value='inativo'>Inativo</option>";
            } elseif ($_row["status"] == "inativo") {
                echo "<option value='ativo'>Ativo</option>
                      <option value='inativo' selected>Inativo</option>";
            }
            echo "</select><br>
                  <input type='submit' value='Atualizar'>
                  
                  </form>";
        } else {
            echo "Nenhum resultado encontrado para este ID.";
        }
    } else {
        echo "ID não foi fornecido.";
    }
    ?>
</body>

</html>