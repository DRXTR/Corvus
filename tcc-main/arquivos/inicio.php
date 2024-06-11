<?php
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('Location: login.php');
    exit;
}
$logdo = $_SESSION['email'];

// Conexão ao banco de dados
$servername = "127.0.0.1";
$username = "root";
$password = ""; // Assumindo que não há senha para o usuário root
$dbname = "upload"; // Altere para o nome real do seu banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se foi enviado um arquivo
if (isset($_FILES["arquivo"])) {
    $diretorio_destino = "C:/xampp/htdocs/TCC/arquivos/";

    $arquivo_nome = $_FILES["arquivo"]["name"];
    $arquivo_tmp = $_FILES["arquivo"]["tmp_name"];
    $arquivo_tamanho = $_FILES["arquivo"]["size"];
    $arquivo_erro = $_FILES["arquivo"]["error"];

    if ($arquivo_erro !== UPLOAD_ERR_OK) {
        die("Erro ao enviar arquivo. Código de erro: $arquivo_erro");
    }

    // Verifica se o arquivo é uma imagem
    $check = getimagesize($arquivo_tmp);
    if ($check !== false) {
        // É uma imagem
        $novo_nome = uniqid() . '_' . $arquivo_nome;
        if (move_uploaded_file($arquivo_tmp, $diretorio_destino . $novo_nome)) {
            $sql = "INSERT INTO publicacoes (email, arquivo_nome, nome_original) VALUES ('$logdo', '$novo_nome', '$arquivo_nome')";
            if ($conn->query($sql) === TRUE) {
                echo "Arquivo publicado com sucesso.";
            } else {
                echo "Erro ao salvar publicação no banco de dados: " . $conn->error;
            }
        } else {
            echo "Falha ao mover o arquivo para o diretório de destino.";
        }
    } else {
        echo "O arquivo enviado não é uma imagem.";
    }
}

// Função de exclusão de publicação
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    
    $sql = "SELECT arquivo_nome FROM publicacoes WHERE id='$delete_id' AND email='$logdo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $arquivo_nome = $row['arquivo_nome'];
        
        if (unlink($diretorio_destino . $arquivo_nome)) {
            $sql = "DELETE FROM publicacoes WHERE id='$delete_id'";
            if ($conn->query($sql) === TRUE) {
                echo "Publicação excluída com sucesso.";
            } else {
                echo "Erro ao excluir publicação do banco de dados: " . $conn->error;
            }
        } else {
            echo "Erro ao excluir o arquivo.";
        }
    } else {
        echo "Publicação não encontrada.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minha Rede Social</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .navbar {
      background-color: #333;
      overflow: hidden;
    }
    .navbar a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
      font-size: 17px;
    }
    .dropdown {
      float: left;
      overflow: hidden;
    }
    .dropdown .dropbtn {
      font-size: 17px;    
      border: none;
      outline: none;
      color: #f2f2f2;
      padding: 14px 20px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }
    .navbar a:hover, .dropdown:hover .dropbtn {
      background-color: #ddd;
      color: black;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }
    .dropdown-content a:hover {
      background-color: #ddd;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .publicacao {
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 10px;
    }
    .publicacao img {
      max-width: 100%;
      height: auto;
    }

    .button {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 9px 12px;
      gap: 8px;
      height: 40px;
      width: 40px;
      border: none;
      border-radius: 20px;
      cursor: pointer;
    }

    .label {
      line-height: 22px;
      font-size: 17px;
      color: #fff;
      font-family: sans-serif;
      letter-spacing: 1px;
    }

    .button:hover .svg-icon {
      animation: flickering 2s linear infinite;
    }

    @keyframes flickering {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 1;
      }

      52% {
        opacity: 1;
      }

      54% {
        opacity: 0;
      }

      56% {
        opacity: 1;
      }

      90% {
        opacity: 1;
      }

      92% {
        opacity: 0;
      }

      94% {
        opacity: 1;
      }

      96% {
        opacity: 0;
      }

      98% {
        opacity: 1;
      }

      99% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

    input[type="file"] {
      display: none;
    }

    footer {
      background-color: #333;
      color: white;
      padding: 10px;
      text-align: center;
      position: relative;
      align-items: center;
      top: 500px;
    }

    .mySlides {display:none}
    .w3-left, .w3-right, .w3-badge {cursor:pointer}
    .w3-badge {height:13px;width:13px;padding:0}
  </style>
</head>
<body>

<div class="navbar">
  <a href="#home">Home</a>
  <a href="#perfil">Perfil</a>
  <div class="dropdown">
    <button class="dropbtn">Amigos 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#listagem">Listagem</a>
      <a href="#solicitacoes">Solicitações</a>
      <a href="#buscar">Buscar</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Configurações 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#perfil">Editar Perfil</a>
      <a href="#privacidade">Privacidade</a>
      <a href="#notificacoes">Notificações</a>
    </div>
  </div>
  <a href="#mensagens">Mensagens</a>
  <a href="#notificacoes">Notificações</a>
  <a href="sair.php" style="float:right">Sair</a>
</div>

<div class="w3-container">
  <h2>Slideshow Indicators</h2>
  <p>An example of using buttons to indicate how many slides there are in the slideshow, and which slide the user is currently viewing.</p>
</div>

<h3>Publicações</h3>
<?php
$sql = "SELECT id, arquivo_nome, nome_original FROM publicacoes WHERE email='$logdo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='publicacao'>";
        echo "<img src='/TCC/arquivos/" . htmlspecialchars($row['arquivo_nome']) . "' alt='" . htmlspecialchars($row['nome_original']) . "'>";
        echo "<form method='POST' style='display:inline;'>
                <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                <button type='submit'>Excluir</button>
              </form>";
        echo "</div>";
    }
} else {
    echo "Nenhuma publicação encontrada.";
}
?>

<h3>Conteúdo da Página</h3>
<p>Este é um exemplo de uma navbar para uma rede social.</p>

<footer>
<form method="POST" enctype="multipart/form-data" action="">
    <label for="arquivo" class="button">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none" class="svg-icon">
        <g stroke-width="2" stroke-linecap="round" stroke="#fff" fill-rule="evenodd" clip-rule="evenodd">
          <path d="m4 9c0-1.10457.89543-2 2-2h2l.44721-.89443c.33879-.67757 1.03131-1.10557 1.78889-1.10557h3.5278c.7576 0 1.4501.428 1.7889 1.10557l.4472.89443h2c1.1046 0 2 .89543 2 2v8c0 1.1046-.8954 2-2 2h-12c-1.10457 0-2-.8954-2-2z"></path>
          <path d="m15 13c0 1.6569-1.3431 3-3 3s-3-1.3431-3-3 1.3431-3 3-3 3 1.3431 3 3z"></path>
        </g>
      </svg>
      <span class="label"></span>
    </label>
    <input type="file" id="arquivo" name="arquivo">
    <button type="submit">Publicar</button>
</form>
</footer>


<script src="slidesS.js"></script>
</body>
</html>
