<?php
include 'src/components/Footer.php';
include 'src/components/HeaderWithSearch.php';
include 'src/components/Breadcrumb.php';
include 'src/components/Featurettes.php';

// Cargar los datos del archivo JSON
$preguntasData = json_decode(file_get_contents(__DIR__ . '/src/db/preguntas.json'), true);

// Capturar el parámetro `id` de la URL
$selectedId = isset($_GET['id']) ? $_GET['id'] : null;

// Buscar los datos de la tarjeta correspondiente
$selectedQuestion = null;
foreach ($preguntasData['preguntas'] as $faq) {
    if ($faq['id_html'] === $selectedId) {
        $selectedQuestion = $faq;
        break;
    }
}

// Si no se encuentra la pregunta, mostrar un mensaje de error
if (!$selectedQuestion) {
    die("Error: No se encontró información para el ID proporcionado.");
}

// Acceder a los pasos de la pregunta seleccionada
$questionsAndAnswers = isset($selectedQuestion['pasos']) ? $selectedQuestion['pasos'] : [];
$video = isset($selectedQuestion['video']) ? $selectedQuestion['video'] : [];
$url_video = isset($selectedQuestion['url_video']) ? $selectedQuestion['url_video'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="public/images/LOGO-UM-COLOR-V-ESCUDO.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        // Si hay una tarjeta seleccionada, agregar su título al <title>
        echo isset($selectedQuestion['titulo']) 
            ? "Guía de Ayuda Illuminate | " . htmlspecialchars($selectedQuestion['titulo'])
            : "Guía de Ayuda Illuminate | UMayor";
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="public/style/home.css">
</head>
<body>
    <?php
    // Cargar datos desde el archivo JSON
    $preguntasData = json_decode(file_get_contents(__DIR__ . '/src/db/preguntas.json'), true);

    // Capturar la búsqueda desde GET
    $searchText = isset($_GET['search']) ? $_GET['search'] : '';

    // Obtener los resultados filtrados
    $filteredResults = $searchText ? searchQuestions($preguntasData['preguntas'], $searchText) : [];

    // Renderizar el header con la barra de búsqueda
    renderHeaderWithSearch($searchText);

    // Pasar la pregunta seleccionada al breadcrumb
    renderBreadcrumb($selectedQuestion); // Llamar la función para mostrar el breadcrumb y encabezado

    echo $preguntasData['video'];
// Renderizar las featurettes
echo renderFeaturettes($questionsAndAnswers, $video, $url_video);
        renderFooter();
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="public/js/search.js"></script>
</body>
</html>