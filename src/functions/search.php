<?php
require_once(__DIR__ . '/../functions/functions.php');

// Cargar datos del archivo JSON
$jsonPath = __DIR__ . '/../db/preguntas.json';
if (!file_exists($jsonPath)) {
    die('Error: No se encontró el archivo de preguntas.');
}

$preguntasData = json_decode(file_get_contents($jsonPath), true);

// Validar si el JSON tiene el formato esperado
if (!isset($preguntasData['preguntas']) || !is_array($preguntasData['preguntas'])) {
    die('Error: El archivo de preguntas no tiene el formato correcto.');
}

// Capturar la búsqueda desde GET
$searchText = isset($_GET['search']) ? $_GET['search'] : '';

// Obtener los resultados filtrados
$filteredResults = $searchText ? searchQuestions($preguntasData['preguntas'], $searchText) : [];

// Generar HTML para los resultados
if (empty($filteredResults)) {
    echo '<div class="list-group-item">No se encontraron resultados.</div>';
} else {
    foreach ($filteredResults as $result) {
        // Aquí construimos el enlace hacia la página WebTutorial.php con el ID
        $url = "WebTutorial.php?id=" . urlencode($result['id_html']);
        
        echo '<a href="' . $url . '" class="list-group-item list-group-item-action">';
        echo '<i class="bi bi-' . htmlspecialchars($result['icono']) . '"></i>';
        echo '<strong> ' . htmlspecialchars($result['titulo']) . ': </strong> ';
        echo htmlspecialchars($result['descripcion']);
        echo '</a>';
    }
}
?>