<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Visitas | Semana de Sistemas 2025</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <header class="site-header">
    <div class="container">
      <h1 class="site-title">Semana de Sistemas 2025</h1>
      <p class="site-subtitle">Blog sobre SDS25 | Visitas</p>
    </div>
  </header>

  <nav class="site-nav">
    <div class="container nav-inner">
      <a href="inicio" class="nav-logo">Inicio</a>
      <ul class="nav-links">
        <li><a href="lunes">Lunes</a></li>
        <li><a href="martes">Martes</a></li>
        <li><a href="miercoles">Miércoles</a></li>
        <li><a href="jueves">Jueves</a></li>
        <li><a href="viernes">Viernes</a></li>
        <li><a href="miinfo">Mi información</a></li>
        <li><a href="visita" class="btn-cta">Visitas</a></li>
      </ul>
      <button class="nav-toggle" aria-label="Abrir menú">&#9776;</button>
    </div>
  </nav>

  <main class="site-main">
    <div class="container">

      <section class="form-shell">
        <div class="form-head">
          <h2>Registrar visita</h2>
          <p class="form-sub">Imgresa tu nombre, correo y un comentario opcional.</p>
        </div>

        <?php if (!empty($success)): ?>
          <div class="alert alert-success">
            <?= htmlspecialchars($success) ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
          <div class="alert alert-error">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <form class="form-card" method="post" action="?r=visita" autocomplete="off" novalidate>
          <div class="form-grid">
            <div class="form-group">
              <label for="nombre">Nombre <span class="req">*</span></label>
              <input id="nombre" name="nombre" type="text" required placeholder="Tu nombre y un apellido">
              <small class="hint">Escribe un nombre y apellido.</small>
            </div>

            <div class="form-group">
              <label for="correo">Correo <span class="req">*</span></label>
              <input id="correo" name="correo" type="email" required placeholder="tunombre@correo.com">
              <small class="hint">Usa un correo válido para poder contactarte en un futuro.</small>
            </div>

            <div class="form-group form-group--full">
              <label for="comentario">Comentario</label>
              <textarea id="comentario" name="comentario" rows="4" placeholder="Tu comentario (opcional)"></textarea>
            </div>
          </div>

          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Registrar visita</button>
            <a class="btn btn-ghost" href="inicio">Volver al inicio</a>
          </div>
        </form>
      </section>

    </div>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>© 2025 Semana de Sistemas | Visitas</small>
    </div>
  </footer>
    <script src="js/burger.js"></script>

</body>
</html>
