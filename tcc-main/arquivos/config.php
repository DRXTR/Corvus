<?php 

define("DB_SERVER", "localhost");
define("DB_USER", "root");  // Certifique-se de que corresponde exatamente ao nome de usuário do MySQL
define("DB_PASSWORD", "Admin");  // Certifique-se de que corresponde exatamente à senha do MySQL
define("DB_DATABASE", "formulario");

// Criar conexão
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
