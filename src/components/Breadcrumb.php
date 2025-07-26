<?php
function renderBreadcrumb($selectedQuestion = null) {
    // Verificar si hay una pregunta seleccionada
    $homeLink = "<li class='breadcrumb-item'>
                    <a class='link-body-emphasis' href='index.php'>
                        Preguntas Frecuentes
                    </a>
                 </li>";

    $libraryLink = "";

    // Si hay una tarjeta seleccionada, mostrar su título
    if ($selectedQuestion) {
        $libraryLink = "<li class='breadcrumb-item'>
                            <a class='link-body-emphasis fw-semibold text-decoration-none' href='#'>
                                {$selectedQuestion['titulo']}
                            </a>
                        </li>";
    }

    echo "
    <!-- Breadcrumb -->
    <section class='container mt-3'>
        <nav aria-label='breadcrumb'>
            <ol class='breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3'>
                $homeLink
                $libraryLink
            </ol>
        </nav>

        <!-- Encabezado -->
        <h5>Guía de ayuda con respecto a la plataforma de Illuminate.</h5>
    </section>
    ";
}
?>