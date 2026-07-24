<?php

function mostrarOferta() {
    $ofertas = [
        "🔥 20% de descuento en vuelos a Buenos Aires",
        "🌴 Paquetes a Brasil con hotel incluido",
        "✈️ Oferta relámpago: vuelos nacionales desde $29.990"
    ];

    $mensaje = $ofertas[array_rand($ofertas)];

    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          const toastContainer = document.createElement('div');
          toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
          document.body.appendChild(toastContainer);

          const toast = document.createElement('div');
          toast.className = 'toast show text-bg-primary border-0';
          toast.role = 'alert';
          toast.innerHTML = `
            <div class='d-flex'>
              <div class='toast-body'>
                <strong>Oferta especial</strong><br>$mensaje
              </div>
              <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast'></button>
            </div>
          `;

          toastContainer.appendChild(toast);

          const bsToast = new bootstrap.Toast(toast, { delay: 6000 });
          bsToast.show();
      });
    </script>
    ";
}

mostrarOferta();
?>

