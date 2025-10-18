<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Inicio | Semana de Sistemas 2025</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <header class="site-header">
    <div class="container">
      <h1 class="site-title">Semana de Sistemas 2025</h1>
      <p class="site-subtitle">Blog sobre SDS25 | Inicio</p>
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

      <section class="cards cards--single">
        <article class="card card--xl">
          <h3>Bienvenido a la Semana de Sistemas 2025</h3>
          <p>
            Este blog recopila el día a día, los momentos que se vivieron en la SDS25. 
            Contando con las ponencias, talleres, ferias y actividades varias
            que vivimos como comunidad universitaria de una misma carrera.
          </p>
        </article>
      </section>

      <section class="perfil-split">
        <div class="split-card">
          <figure class="split-photo">
            <img src="images/foto1.jpg" alt="Momentos destacados">
          </figure>
          <div class="split-content">
            <h2 class="split-title" style="text-align:center;">Lo que hace especial a SDS25</h2>
            <p class="split-desc">
              Más que una agenda de eventos, SDS25 es encuentro, colaboración y creatividad.
              En espacio para convivir como estudiantes de una msima carrera y dar festejo a lo grande que es
              y a la lucha que sigue a dia de hoy por hacer respetar nuestra carrera, comenzaron las antiguas generaciones y es nuestro deber como nuevas, mantener ese espítiru que lo comenzo todo
            </p>
            <ul class="split-meta">
              <li>Itinerario</li>
              <li>Ponencias</li>
              <li>Feria de logros</li>
              <li>Actividades</li>
            </ul>
          </div>
        </div>
      </section>

      <?php
        $lista = isset($visitas) && is_array($visitas) ? $visitas : [];
      ?>

      <?php if (!empty($lista)): ?>
        <section class="comments">
          <h2 class="comments-title">Comentarios</h2>
          <div class="comment-list">
            <?php foreach ($lista as $c): ?>
              <article class="comment-item">
                <header class="comment-head">
                  <h3 class="comment-name">
                    <?= htmlspecialchars($c['nombre'] ?? 'Anónimo') ?>
                  </h3>
                  <?php if (!empty($c['fecha'])): ?>
                    <time class="comment-date">
                      <?= htmlspecialchars(date('d/m/Y H:i', strtotime($c['fecha']))) ?>
                    </time>
                  <?php endif; ?>
                </header>
                <?php if (!empty($c['comentario'])): ?>
                  <p class="comment-body">
                    <?= nl2br(htmlspecialchars($c['comentario'])) ?>
                  </p>
                <?php endif; ?>
              </article>
            <?php endforeach; ?>
          </div>
        </section>
      <?php else: ?>
        <section class="comments">
          <h2 class="comments-title">Comentarios</h2>
          <p class="comment-empty">No hay comentarios registrados.</p>
        </section>
      <?php endif; ?>

    </div>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>© 2025 Semana de Sistemas. Derechos reservados</small>
    </div>
  </footer>
  <script src="js/burger.js"></script>
</body>
</html>
