<?php
// Función para filtrar preguntas
function searchQuestions($preguntas, $query) {
    if (!is_array($preguntas) || empty($query)) {
        return []; // Retorna un array vacío si los datos no son válidos
    }

    $query = strtolower(trim($query)); // Convertir a minúsculas y eliminar espacios extra
    $results = [];
    
    foreach ($preguntas as $pregunta) {
        if (
            strpos(strtolower($pregunta['titulo']), $query) !== false || 
            strpos(strtolower($pregunta['descripcion']), $query) !== false
        ) {
            $results[] = $pregunta; // Agregar coincidencia al resultado
        }
    }

    return array_slice($results, 0, 5); // Limitar a 5 resultados
}
?>