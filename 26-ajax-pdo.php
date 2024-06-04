<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $nombre = $_POST["nombre"];        
        $dsn = "mysql:host=localhost;dbname=covid";
        $user = "root"; // user: usuario
        $pass = "root"; // pass: clave de usuario

        $db = new PDO($dsn, $user, $pass);
        
        $stmt = $db->prepare("SELECT * FROM paci WHERE nombres LIKE :nombre");
        $stmt->execute(['nombre' => '%' . $nombre . '%']);

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($resultado);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
