<?php
require_once(__DIR__ . '/../../src/functions/functions.php');

// src/components/HeaderWithSearch.php

function renderHeaderWithSearch($searchText = '') {
    $searchText = htmlspecialchars($searchText); // Sanitizar el texto para evitar problemas de seguridad

    echo '
    <nav class="navbar navbar-light bg-warning">
        <div class="container-fluid d-flex justify-content-between">
            <!-- Enlace al extremo izquierdo -->
            <div>
                <a class="navbar-brand" href="index.php">
                    <img src="public/images/LOGO-UM-NEGRO-V.png" alt="Logo" style="width: 90px; height: 70px; margin-right: 10px;">
                    Plataforma de Ayuda para Anthology Illuminate
                </a>
            </div>
            <!-- Enlace al extremo derecho -->
            <div>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="icon-link icon-link-hover" href="https://www.umayor.cl" target="_blank" rel="noopener">
                            U Mayor
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="icon-link icon-link-hover" href="https://illuminate.blackboard.com/" target="_blank" rel="noopener">
                            Illuminate
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Barra de búsqueda -->
        <div class="container mt-4">
            <form method="get" action="src/functions/search.php" class="input-group mb-3 px-3" id="search-form">
                <input 
                    type="text" 
                    class="form-control" 
                    name="search" 
                    id="search-input"
                    placeholder="Ingresar palabra clave" 
                    aria-label="Search" 
                    aria-describedby="button-addon2" 
                    value="' . $searchText . '"
                />
            </form>
            <!-- Resultados -->
            <div id="search-results" class="list-group px-3">
                <!-- Los resultados de búsqueda se inyectarán aquí con PHP -->
            </div>
        </div>
    </nav>';
}

?>
