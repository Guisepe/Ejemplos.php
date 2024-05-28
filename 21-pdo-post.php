<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $talla = $_POST['talla'];
    $peso = $_POST['peso'];
    $fecha = $_POST['fecha'];


    if (empty($nombre) || empty($apellido) || empty($edad) || empty($talla) || empty($peso)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }


    $tos = array_key_exists("tos", $_POST) ? 1 : 0;
    $fiebre = array_key_exists("fiebre", $_POST) ? 1 : 0;
    $disnea = array_key_exists("disnea", $_POST) ? 1 : 0;
    $dolor_muscular = array_key_exists("dolor_muscular", $_POST) ? 1 : 0;
    $gripe = array_key_exists("gripe", $_POST) ? 1 : 0;
    $presion_alta = array_key_exists("Presion_alta", $_POST) ? 1 : 0;
    $fatiga = array_key_exists("Fatiga", $_POST) ? 1 : 0;
    $garraspera = array_key_exists("Garraspera", $_POST) ? 1 : 0;


    $resultado = ($tos || $fiebre || $disnea || $dolor_muscular || $gripe || $presion_alta || $fatiga || $garraspera) ? 1 : 0;


    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "covid";

    try {
 
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();


        $sql = "INSERT INTO `pacientes` (`nombres`, `apellidos`, `edad`, `talla_m`, `peso_kg`, 
                `sintoma_tos`, `sintoma_fiebre`, `sintoma_disnea`, `sintoma_dolormuscular`, 
                `sintoma_gripe`, `sintoma_presionalta`, `sintoma_fatiga`, `sintoma_garraspera`, 
                `ultima_fecha_vacunacion`, `resultado`) 
                VALUES (:nombre, :apellido, :edad, :talla, :peso, :tos, :fiebre, :disnea, 
                :dolor_muscular, :gripe, :presion_alta, :fatiga, :garraspera, :fecha, :resultado)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':talla', $talla);
        $stmt->bindParam(':peso', $peso);
        $stmt->bindParam(':tos', $tos);
        $stmt->bindParam(':fiebre', $fiebre);
        $stmt->bindParam(':disnea', $disnea);
        $stmt->bindParam(':dolor_muscular', $dolor_muscular);
        $stmt->bindParam(':gripe', $gripe);
        $stmt->bindParam(':presion_alta', $presion_alta);
        $stmt->bindParam(':fatiga', $fatiga);
        $stmt->bindParam(':garraspera', $garraspera);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':resultado', $resultado);

        $stmt->execute();
        $conn->commit();

        echo "Fue registrado correctamente.";
    } catch (Exception $e) {
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>
