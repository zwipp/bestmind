<?php
    require_once 'usuarios.php';
    $u = new Usuario;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    
    <div class="div1">
        <h1>Cadastro</h1>
        <form method="POST">
            <div class="div2"> 
                <input type="text" name="nome" placeholder="nome" maxlength="40">
                <input type="email" name="email" placeholder="email" maxlength="40">
                <input type="text" name="senha" placeholder="senha" maxlength="32">
                <input type="text" name="telefone" placeholder="telefone" maxlength="40">
                <input type="submit" value="Cadastrar">
            </div>
        </form>
    </div>

    <a href="home.php">login</a>

<?php
    if (isset($_POST['nome'])){

        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $telefone = addslashes($_POST['telefone']);

        if(!empty($nome) && !empty($email) && !empty($senha) && !empty($telefone)){
            $u->conectar("Bestmind", "localhost", "root", "gnz2010");
            if($u->msgErro == ""){
                if($u->cadastrar($nome,$email,$senha,$telefone)){
                    echo "Cadastrado com sucesso";
                }
                else{
                    echo "Já cadastrado";
                }
            }
            else{
                echo "Erro: ".$u->msgErro;
            }
        }
        else{
            echo "Preencha todos os campos";
        }

    }

?>



</body>
</html>