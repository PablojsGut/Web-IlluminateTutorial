document.getElementById('search-input').addEventListener('input', function () {
    const query = this.value;
    const resultsContainer = document.getElementById('search-results');

    // Si el campo está vacío, limpia los resultados
    if (!query.trim()) {
        resultsContainer.innerHTML = '';
        return;
    }

    // Realizar solicitud a search.php
    fetch('src/functions/search.php?search=' + encodeURIComponent(query))
        .then(response => response.text())
        .then(html => {
            resultsContainer.innerHTML = html; // Mostrar resultados
        })
        .catch(error => {
            console.error('Error al buscar:', error);
            resultsContainer.innerHTML = '<div class="list-group-item">Error al cargar resultados.</div>';
        });
});
