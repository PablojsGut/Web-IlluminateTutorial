<?php
function renderFAQCard($title, $text, $id, $icon) {
  // Construir la URL para redirigir con el parámetro `id`
  $url = "WebTutorial.php?id=" . urlencode($id);
  echo "
  <a href='$url'>
    <div class='card mt-3 bg-light'>
      <div class='card-body'>
        <h5 class='card-title'>
          <span class='material-symbols-outlined' style='margin-right: 10px;'>
            $icon
          </span>
          $title
        </h5>
        <p class='card-text'>$text</p>
      </div>
    </div>
  </a>
  ";
}

?>