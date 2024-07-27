<?php
include 'conexaoProSaude.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_proSaude = $_POST['nomeProSaude'];
    $CORENouCRM_proSaude = $_POST['CORENouCRMProSaude'];
    $telefone_proSaude = $_POST['telefoneProSaude'];
    $email_proSaude = $_POST['emailProSaude'];   
    $senha_proSaude = $_POST['senhaProSaude'];

    // Verifica se a conexão foi estabelecida
    if ($conn) {
        $sql = "INSERT INTO tb_ProSaude (nomeProSaude, cpfProSaude, dataNascimentoProSaude, CORENProSaude, emailProSaude, telefoneProSaude, enderecoProSaude, numeroEnderecoProSaude, bairroProSaude, cidadeProSaude, complementoProSaude, CEPProSaude, senhaProSaude) 
        VALUES ('$nome_proSaude', '$cpf_proSaude', '$dataNascimento_proSaude', '$COREN_proSaude', '$email_proSaude', '$telefone_proSaude', '$endereco_proSaude', '$numeroEndereco_proSaude', '$bairro_proSaude','$cidade_proSaude', '$complemento_proSaude', '$CEP_proSaude', '$senha_proSaude')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo profissional da saúde cadastrado com sucesso!";
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
    <title>Cadastro do ProSaude</title>
</head>
<body>
    <h2>Cadastro do ProSaude</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nome: <input type="text" name="nomeProSaude" required><br><br>
        COREN/CRM: <input type="number" name="CORENouCRMProSaude" required><br><br>
        Telefone: <input type="number" name="telefoneProSaude" required><br><br>
        Email: <input type="email" name="emailProSaude" required><br><br>
        Endereço: <input type="text" name="enderecoProSaude" required><br><br>
        Senha: <input type="number" name="senhaProSaude" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>