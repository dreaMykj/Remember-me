<?php
include 'conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_usuario = $_POST['tipo_usuario'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Proteção contra SQL Injection
    $username = $conn->real_escape_string($username);

    if ($tipo_usuario == "paciente") {
        $sql = "SELECT id, cpf, password FROM pacientes WHERE cpf = '$username'";
    } elseif ($tipo_usuario == "cuidador") {
        $cpf_paciente = $_POST['cpf_paciente'];
        $cpf_paciente = $conn->real_escape_string($cpf_paciente);
        $sql = "SELECT id, cpf, cpf_paciente, password FROM cuidadores WHERE cpf = '$username' AND cpf_paciente = '$cpf_paciente'";
    } elseif ($tipo_usuario == "profissional") {
        $sql = "SELECT id, coren, password FROM profissionais WHERE coren = '$username'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificação da senha
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['tipo_usuario'] = $tipo_usuario;
            header("Location: dashboard.php");
            if($lembrar_me)
            {
               setcookie('username',$username,time() + 7000 * 30, "/");
            }
            exit();
        } else {
            $error = "Senha incorreta.";
        }
    } else {
        $error = "Usuário não encontrado.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script>
        function showFields() {
            var tipo_usuario = document.getElementById("tipo_usuario").value;
            document.getElementById("cpf_field").style.display = "none";
            document.getElementById("cpf_paciente_field").style.display = "none";
            document.getElementById("coren_field").style.display = "none";
            document.getElementById("password_field").style.display = "block";

            if (tipo_usuario == "paciente") {
                document.getElementById("cpf_field").style.display = "block";
            } else if (tipo_usuario == "cuidador") {
                document.getElementById("cpf_field").style.display = "block";
                document.getElementById("cpf_paciente_field").style.display = "block";
            } else if (tipo_usuario == "profissional") {
                document.getElementById("coren_field").style.display = "block";
            }
        }
    </script>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Tipo de Usuário: 
        <select id="tipo_usuario" name="tipo_usuario" onchange="showFields()" required>
            <option value="">Selecione</option>
            <option value="paciente">Paciente</option>
            <option value="cuidador">Cuidador</option>
            <option value="profissional">Profissional de Saúde</option>
        </select><br><br>

        <div id="cpf_field" style="display:none;">
            CPF: <input type="text" name="username"><br><br>
        </div>
        
        <div id="cpf_paciente_field" style="display:none;">
            CPF do Paciente: <input type="text" name="cpf_paciente"><br><br>
        </div>
        
        <div id="coren_field" style="display:none;">
            COREN: <input type="text" name="username"><br><br>
        </div>

        <div id="password_field" style="display:none;">
            Senha: <input type="password" name="password" required><br><br>
        </div>
         <input type="checkbox" name="lembrar_me">Lembrar-me <a href="">Esqueceu a senha?</a><br><br>
         <input type="submit" value="Entrar">
    </form>
</body>
</html>