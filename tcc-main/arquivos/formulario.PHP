<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 150%;
            height: 150%;
            overflow: hidden;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
        }
        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #1f1c15;
            padding: 15px;
            border-radius: 15px;
            width: 80%;
            height: 60%;
        }
      fieldset {
            border: 3px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        legend {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
            background-color: #000;
            border-radius: 8px;
        }
        .inputBox {
            position: relative;
        }
        .inputUser {
            border-radius: 5px;
            height: 40px;
            background: white;
            border: none;
            outline: none;
            color: black;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput {
            color: black;
            position: absolute;
            padding: 10px;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput {
            top: -30px;
            font-size: 12px;
            color: #f1f1f1;
        }
        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit {
            background-color: white;
            width: 100%;
            border: none;
            padding: 15px;
            color: black;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover {
            background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
        }
        #logo_in {
            width: 600px;
            height: 600px;
            position: relative;
            right: 170%;
            top: 600px;
        }
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        video {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            filter: blur(10px);
            opacity: ;
        }
        #video2 {
            animation: moveVideos 30s linear infinite;
        }
        #video3 {
            animation: moveVideos 60s linear infinite reverse;
        }
        .content {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
            margin-top: 20%;
        }
        @keyframes moveVideos {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }
        header {
            height: 70px;
            background-color: #000;
            justify-content: left space-between;
            display: flex;
        }

        header a {
            float: left;
            padding: 27px;
            height: 60px;
        }

        a:hover {
            color: pink;
        }

        a{
            text-decoration: none;
            color: White;
        }
        .form_cont {
            width: 40%;
            position: relative;
            float: right;
            padding: 50px;
            bottom: 70px;
        }

        .form{
            position: relative;
            bottom: 730px;
            width: 70%;
            display: flex;
            flex-direction: column ;
            justify-content: space-between;
            gap: 50px;
        }

        .form_cont h1{
            font-size: 60px;
            position: relative;
            left: 15%;
        }

        .google_log {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            border: 1px solid #d3d3d3;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .google_log img {
            width: 20px; /* Ajuste o tamanho conforme necessário */
            height: 20px; /* Ajuste o tamanho conforme necessário */
            margin-right: 10px; /* Espaço entre a imagem e o texto */
        }

        .redirection {
            position: relative;
            bottom: 20px;
        }
    </style>
</head>
<body>
<header>
        <a href="#">Inicio</a>
        <a href="#"> Sobre Nós</a>
    </header>

    <a href="home.php"></a>
    <div class="box">
        <form action="formulario.php" method='post'>
            <fieldset>
                <div class="form_cont">
                    <h1>Cadrasto</h1>
                    <div class="form">
                <img id="logo_in" src="nocolor1.png">
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome de usuario</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <input type="submit" name="submit" id="submit">
                <button class="google_log"><img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png" alt="a">Google</button>
                <a href="login.php" class="redirection">Já Possui uma Conta? Login</a>
                </div>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="video-container">
        <video autoplay muted loop id="video1">
            <source src="v1.mov" type="video/mp4">
        </video>
        <video autoplay muted loop id="video2">
            <source src="v2.mov" type="video/mp4">
        </video>
        <video autoplay muted loop id="video3">
            <source src="v3.mov" type="video/mp4">
        </video>
    </div>

    <script>
        // Diminui a velocidade dos vídeos
        document.getElementById('video1').playbackRate = 0.5; // Define a velocidade do vídeo 1 para 50%
        document.getElementById('video2').playbackRate = 0.5; // Define a velocidade do vídeo 2 para 50%
        document.getElementById('video3').playbackRate = 0.5; // Define a velocidade do vídeo 3 para 50%
    </script>
</body>
</html>
