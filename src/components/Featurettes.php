<?php
function renderFeaturettes($questionsAndAnswers, $video, $url_video) {
    $html = '<div class="container marketing">';

    foreach ($questionsAndAnswers as $index => $step) {
        $orderClass = ($index % 2 === 0) ? '' : ' order-md-2'; // Alternar la posición
        $orderImage = ($index % 2 === 0) ? '' : ' order-md-1'; // Alternar la imagen

        $html .= '
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7' . $orderClass . '">
                <h2 class="featurette-heading">' . htmlspecialchars($step['titulo']) . '<span class="text-body-secondary">' . htmlspecialchars($step['subtitulo']) . '</span> </h2>
                <p>' . nl2br($step['detalle']) . '</p>
            </div>
            <div class="col-md-5' . $orderImage . '">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" 
                    src=" ' . $step['img'] . '" 
                    width="500" 
                    height="280" 
                    alt="Imagen animada (GIF)" />
            </div>
        </div>';
    }
    $html .= '
    <hr class="featurette-divider">
    <div class="card mb-3">
        <iframe class="card-img-top" width="560" height="315" src="' . $video . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div class="card-body">
            <a href="' . $url_video . '"><h5 class="card-title">Verlo desde Youtube</h5></a>
        </div>
    </div>
    </div>';

    return $html;
}
?>
