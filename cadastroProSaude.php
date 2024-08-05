<?php
include 'conexaoBanco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_proSaude = $_POST['nomeProSaude'];
    $CORENouCRM_proSaude = $_POST['CORENouCRMProSaude'];
    $telefone_proSaude = $_POST['telefoneProSaude'];
    $email_proSaude = $_POST['emailProSaude'];   
    $senha_proSaude = $_POST['senhaProSaude'];

    // Verifica se a conexão foi estabelecida
    if ($conn) {
        $sql = "INSERT INTO tb_prosaude (nomeProSaude,CORENouCRMProSaude, telefoneProSaude, emailProSaude, senhaProSaude) 
        VALUES ('$nome_proSaude','$CORENouCRM_proSaude','$telefone_proSaude','$email_proSaude','$senha_proSaude')";

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
        Senha: <input type="text" name="senhaProSaude" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>