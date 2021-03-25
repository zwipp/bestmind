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
    <title>Login</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    
    <div class="div1">
        <h1>Login</h1>
        <form method="POST">
            <div class="div2"> 
                <input type="email" name="email" placeholder="Email" maxlength="40">
                <input type="password" name="senha" placeholder="senha" maxlength="32">
                <input type="submit" value="LOGAR">
            </div>
        </form>

        <div class="div3">
            <a href="cadastro.php">cadastrar</a>
        </div>
    </div>

<?php

    if (isset($_POST['email'])){

        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        
        if(!empty($email) && !empty($senha)){
            
            $u->conectar("Bestmind", "localhost", "root", "gnz2010");
            

            if($u->msgErro == ""){ 
                if($u->logar($email,$senha)){
                    header("location: logo.php");
                }
                else{
                    echo "Email e/ou senha invalidos";
                }
            }
            else {
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