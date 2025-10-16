<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>Registrar visita</h1>

  <?php if (!empty($success)): ?>
    <p style="color:green;">✅ <?= htmlspecialchars($success) ?></p>
  <?php endif; ?>

  <?php if (!empty($error)): ?>
    <p style="color:red;">❌ <?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <form method="post" action="?r=visitas" autocomplete="off">
    <div>
      <label>Nombre*:
        <input type="text" name="nombre" required>
      </label>
    </div>
    <div>
      <label>Correo*:
        <input type="email" name="correo" required>
      </label>
    </div>
    <div>
      <label>Comentario:
        <textarea name="comentario" rows="4"></textarea>
      </label>
    </div>
    <button type="submit">Registrar visita</button>
  </form>

  <p><a href="?r=inicio">Volver al inicio</a></p>
</body>
</html>