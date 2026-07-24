<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agencia de Viajes | Busca vuelos y hoteles</title>
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>

  <!-- Notificaciones PHP -->
  <?php require_once("notificaciones.php"); ?>

  <header class="bg-primary text-white shadow-sm">
    <div class="container py-4">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand fw-bold" href="#">Gama Travel Agency</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="#buscador">Buscar</a></li>
            <li class="nav-item"><a class="nav-link" href="#ofertas">Ofertas</a></li>
            <li class="nav-item"><a class="nav-link" href="#paquetes">Paquetes</a></li>
            <li class="nav-item"><a class="nav-link" href="#notificaciones">Alertas</a></li>
           
          </ul>
          <a href="carrito.php" class="btn btn-outline-light position-relative me-2">
    <i class="bi bi-cart3"></i>
</a>
        </div>
      </nav>
    </div>
  </header>

  <main class="container my-5">
    

    <!-- FORMULARIO PHP  -->
    <section class="hero p-4 p-lg-5 rounded-4 shadow-sm bg-white px-0" id="buscador">
      <div class="row align-items-center">

        <div class="col-lg-6 mt-4 mt-lg-0">
            
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h2 class="h4 mb-3">Registrar intención de viaje</h2>

              <form action="procesar_viaje.php" method="post">
                <div class="row g-3">

                  <div class="col-md-6">
                    <label class="form-label">Hotel</label>
                    <input type="text" name="hotel" class="form-control" placeholder="Nombre del hotel" required>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" placeholder="Ej.: París" required>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">País</label>
                    <input type="text" name="pais" class="form-control" placeholder="Ej.: Francia" required>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Fecha de viaje</label>
                    <input type="date" name="fecha_viaje" class="form-control" required>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Duración (días)</label>
                    <input type="number" name="duracion" class="form-control" min="1" max="365" placeholder="Cantidad de días" required>
                  </div>

                  <div class="col-12 d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar intención</button>
                  </div>

                </div>
              </form>

            </div>
          </div>
        </div>
        <div class="col-lg-5 mt-4 mt-lg-0 d-flex justify-content-end px-0">
      <div id="carouselDestinos" class="carousel slide shadow-sm rounded-4 overflow-hidden" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="imagenes/img1.jpg" class="d-block w-100" alt="Destino 1">
          </div>
          <div class="carousel-item">
            <img src="imagenes/img2.jpg" class="d-block w-100" alt="Destino 2">
          </div>
          <div class="carousel-item">
            <img src="imagenes/img3.jpg" class="d-block w-100" alt="Destino 3">
          </div>
          <div class="carousel-item">
            <img src="imagenes/img4.jpg" class="d-block w-100" alt="Destino 4">
          </div>
          <div class="carousel-item">
            <img src="imagenes/img5.jpg" class="d-block w-100" alt="Destino 5">
          </div>
        </div>
      </div>
    </div>
      </div>
    </section>
    


    <section id="ofertas" class="mt-5">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="info-card p-4 rounded-4 shadow-sm bg-white">
            <h3 class="h5">Vuelos en oferta</h3>
            <p class="small text-muted">Mejores tarifas en tiempo real para tus destinos favoritos.</p>
            <p class="display-6 text-primary mb-0">+120</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info-card p-4 rounded-4 shadow-sm bg-white">
            <h3 class="h5">Hoteles disponibles</h3>
            <p class="small text-muted">Reservas seguras con información actualizada de ocupación.</p>
            <p class="display-6 text-primary mb-0">+85</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info-card p-4 rounded-4 shadow-sm bg-white">
            <h3 class="h5">Paquetes recomendados</h3>
            <p class="small text-muted">Combina vuelo + hotel + actividades en un solo clic.</p>
            <p class="display-6 text-primary mb-0">+40</p>
          </div>
        </div>
      </div>
    </section>

    <section id="paquetes" class="mt-5">
      <!-- Paquetes turísticos -->
<div class="row g-4">

  <!-- Paquete 1 -->
  <div class="col-md-4">
    <div class="card shadow-sm">
      <img src="imagenes/paris.jpg" class="card-img-top" alt="París">
      <div class="card-body">
        <h5 class="card-title">París Romántico</h5>
        <p class="card-text">Vuelo + Hotel 5 noches</p>
        <p class="fw-bold text-primary">$1200 USD</p>

        <form action="carrito.php" method="POST">
          <input type="hidden" name="paquete" value="París Romántico">
          <input type="hidden" name="precio" value="1200">
          <button type="submit" class="btn btn-primary w-100">
            Agregar al carrito
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Paquete 2 -->
  <div class="col-md-4">
    <div class="card shadow-sm">
      <img src="imagenes/tokio.jpg" class="card-img-top" alt="Tokio">
      <div class="card-body">
        <h5 class="card-title">Tokio Moderno</h5>
        <p class="card-text">Vuelo + Hotel 7 noches</p>
        <p class="fw-bold text-primary">$1800 USD</p>

        <form action="carrito.php" method="POST">
          <input type="hidden" name="paquete" value="Tokio Moderno">
          <input type="hidden" name="precio" value="1800">
          <button type="submit" class="btn btn-primary w-100">
            Agregar al carrito
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Paquete 3 -->
  <div class="col-md-4">
    <div class="card shadow-sm">
      <img src="imagenes/ny.jpg" class="card-img-top" alt="Nueva York">
      <div class="card-body">
        <h5 class="card-title">Nueva York Express</h5>
        <p class="card-text">Vuelo + Hotel 4 noches</p>
        <p class="fw-bold text-primary">$950 USD</p>

        <form action="carrito.php" method="POST">
          <input type="hidden" name="paquete" value="Nueva York Express">
          <input type="hidden" name="precio" value="950">
          <button type="submit" class="btn btn-primary w-100">
            Agregar al carrito
          </button>
        </form>
      </div>
    </div>
  </div>

</div>

      <div class="d-flex align-items-center justify-content-between mb-3 flex-column flex-md-row gap-3">
        <div>
          <h2 class="h4 mb-1">Resultados de búsqueda</h2>
          <p class="text-muted mb-0">Filtra rápidamente tus opciones por destino, fecha y presupuesto.</p>
        </div>
        <div class="btn-group" role="group" aria-label="Destinos rápidos">
          <button type="button" class="btn btn-outline-primary filter-btn active" data-destination="">Todos</button>
          <button type="button" class="btn btn-outline-primary filter-btn" data-destination="París">París</button>
          <button type="button" class="btn btn-outline-primary filter-btn" data-destination="Nueva York">Nueva York</button>
          <button type="button" class="btn btn-outline-primary filter-btn" data-destination="Tokio">Tokio</button>
        </div>
      </div>

      <div id="resultCards" class="row g-4"></div>
    </section>

    <section id="notificaciones" class="mt-5">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2 class="h4 mb-3">Notificaciones en tiempo real</h2>
          <p class="text-muted">Recibe alertas automáticas sobre precios, disponibilidad y promociones especiales.</p>
          <ul id="liveAlerts" class="list-group list-group-flush"></ul>
        </div>
        <div class="col-lg-4">
          <div class="alert alert-primary shadow-sm" role="alert">
            <i class="bi bi-bell-fill me-2"></i>
            Las alertas cambian cada 8 segundos. ¡No pierdas la mejor oferta del día!
          </div>
        </div>
      </div>
    </section>
    
  </main>

  <div id="notificationArea" class="toast-container position-fixed bottom-0 end-0 p-3"></div>
  
  <footer class="bg-dark text-white text-center py-3 mt-5">
  <p class="mb-0">© 2026 Gama Travel Agency. Todos los derechos reservados.</p>
  </footer>
  <script src="JS/bootstrap.bundle.min.js"></script>
  <script src="Javascript.js"></script>
  <script src="app.js"></script>
</body>
</html>

<!-- 🔥 Panel administrativo -->
<div class="container my-4">
  <h4>Panel administrativo</h4>
  <ul>
    <li><a href="vuelos/formulario_vuelo.php">Registrar vuelos</a></li>
    <li><a href="hoteles/formulario_hotel.php">Registrar hoteles</a></li>
    <li><a href="reservas/consulta_hoteles_reservas.php">Ver reservas por hotel</a></li>
  </ul>
</div>

    
