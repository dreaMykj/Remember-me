<?php
include 'conexaoPaciente.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_paciente = $_POST['nomePaciente'];
    $cpf_paciente = $_POST['cpfPaciente'];
    $SUS_paciente = $_POST['SUSPaciente'];
    $dataNascimento_paciente = $_POST['dataNascimentoPaciente'];
    $email_P = $_POST['emailPaciente'];
    $telefone_paciente = $_POST['telefonePaciente'];
    $endereco_paciente = $_POST['enderecoPaciente'];
    $numeroEndereco_paciente = $_POST['numeroEnderecoPaciente'];
    $bairro_paciente = $_POST['bairroPaciente'];
    $cidade_paciente = $_POST['cidadePaciente'];
    $complemento_paciente = $_POST['complementoPaciente'];
    $CEP_paciente = $_POST['CEPPaciente'];
    $senha_paciente = $_POST['senhaPaciente'];

    // Verifica se a conexão foi estabelecida
    if ($conn) {
        $sql = "INSERT INTO tb_paciente (nomePaciente, cpfPaciente, dataNascimentoPaciente, SUSPaciente, emailPaciente, telefonePaciente, enderecoPaciente, numeroEnderecoPaciente, bairroPaciente, cidadePaciente, complementoPaciente, CEPPaciente, senhaPaciente) 
        VALUES ('$nome_paciente', '$cpf_paciente', '$dataNascimento_paciente', $SUS_paciente', '$email_paciente', '$telefone_paciente', '$endereco_paciente', '$numeroEndereco_paciente', '$bairro_paciente','$cidade_paciente', '$complemento_paciente', '$CEP_paciente', '$senha_cuidador')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo paciente cadastrado com sucesso!";
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
    <title>Cadastro do Paciente</title>
</head>
<body>
    <h2>Cadastro do Paciente</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nome: <input type="text" name="nomePaciente" required><br><br>
        CPF: <input type="number" name="CPFPaciente" required><br><br>
        Data de Nascimento: <input type="text" name="dataNascimentoPaciente" required><br><br>
        Cartão do SUS: <input type="number" name="SUSPaciente" required><br><br>
        Email: <input type="email" name="emailPaciente" required><br><br>
        Telefone: <input type="number" name="telefonePaciente" required><br><br>
        Endereço: <input type="text" name="enderecoPaciente" required><br><br>
        Número de Endereço: <input type="number" name="numeroEnderecoPaciente" required><br><br>
        Bairro: <input type="text" name="bairroPaciente" required><br><br>
        Cidade: <input type="text" name="cidadePaciente" required><br><br>
        Complemento: <input type="text" name="complementoPaciente" required><br><br>
        CEP: <input type="number" name="CEPPaciente" required><br><br>
        Senha: <input type="number" name="senhaPaciente" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>