<?php
include 'conexaoCuidador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_cuidador = $_POST['nomeCuidador'];
    $cpf_cuidador = $_POST['cpfCuidador'];
    $dataNascimento_cuidador = $_POST['dataNascimentoCuidador'];
    $COREN_cuidador = $_POST['CORENCuidador'];
    $email_cuidador = $_POST['emailCuidador'];
    $telefone_cuidador = $_POST['telefoneCuidador'];
    $endereco_cuidador = $_POST['enderecoCuidador'];
    $numeroEndereco_cuidador = $_POST['numeroEnderecoCuidador'];
    $bairro_cuidador = $_POST['bairroCuidador'];
    $cidade_cuidador = $_POST['cidadeCuidador'];
    $complemento_cuidador = $_POST['complementoCuidador'];
    $CEP_cuidador = $_POST['CEPCuidador'];
    $senha_cuidador = $_POST['senhaCuidador'];

    // Verifica se a conexão foi estabelecida
    if ($conn) {
        $sql = "INSERT INTO clientes (nomeCuidador, cpfCuidador, dataNascimentoCuidador, CORENCuidador, emailCuidador, telefoneCuidador, enderecoCuidador, numeroEnderecoCuidador, bairroCuidador, cidadeCuidador, complementoCuidador, CEPCuidador, senhaCuidador) 
        VALUES ('$nome_cuidador', '$cpf_cuidador', '$dataNascimento_cuidador', '$COREN_cuidador', '$email_cuidador', '$telefone_cuidador', '$endereco_cuidador', '$numeroEndereco_cuidador', '$bairro_cuidador','$cidade_cuidador', '$complemento_cuidador', '$CEP_cuidador', '$senha_cuidador')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo cliente cadastrado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Erro na conexão com o banco de dados.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro do Cuidador</title>
</head>
<body>
    <h2>Cadastro do Cuidador</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nome: <input type="text" name="nomeCuidador" required><br><br>
        CPF: <input type="number" name="CPFCuidador" required><br><br>
        Data de Nascimento: <input type="text" name="dataNascimentoCuidador" required><br><br>
        COREN: <input type="number" name="CORENCuidador" required><br><br>
        Email: <input type="email" name="emailCuidador" required><br><br>
        Telefone: <input type="number" name="telefoneCuidador" required><br><br>
        Endereço: <input type="text" name="enderecoCuidador" required><br><br>
        Número de Endereço: <input type="number" name="numeroEnderecoCuidador" required><br><br>
        Bairro: <input type="text" name="bairroCuidador" required><br><br>
        Cidade: <input type="text" name="cidadeCuidador" required><br><br>
        Complemento: <input type="text" name="complementoCuidador" required><br><br>
        CEP: <input type="number" name="CEPCuidador" required><br><br>
        Senha: <input type="number" name="senhaCuidador" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>