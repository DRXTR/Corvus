<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #cabdad;
        }
        div{
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        .inputSubmit{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        .inputSubmit:hover{
            background-color: deepskyblue;
            cursor: pointer;
        }

        img {
            position: relative;
            width: 100px;
            height: 100px;
            right: -60px;
        }
        .login {
            position: relative;
            right: -60px;
        }
    </style>
</head>
<body>
    <a href="home.php"></a>
    <div>
    <img src="nocolor1.png" alt="oii" display='on'>
        <h1 class='login'>Login</h1>
        <form action="testelogin.php" method='POST'>
            <input type="text" name='email' placeholder="email">
                <br><br>
                <input type="password" name='senha' placeholder="Senha">
                <br><br>
            <input class='inputSubmit' type="submit" name='submit' value='Enviar'>
        </form>
    </div>
</body>
</html>