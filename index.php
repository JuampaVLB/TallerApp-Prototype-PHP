<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceder E.E.S.T. Nº5</title>
    <link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
    <div id="container">
    <div class="content">
        <form action="Model/login.php" method = "POST" class="formulario">
            <div class="brand">
                <img src="./public/assets/img/logo.png" alt="" class="logo">
                <p>E E S T N°5</p>
            </div>
            <label for="name">Nombre
                <input type="text" name="name">
            </label>
            <label for="password">Contraseña
                <input type="password" name="password">
            </label>
            <input type="submit" value="Acceder" name = "submit" class="submit">
            <a href="https://tecnica5merlo.edu.ar/wordpress/">← Ir a E.E.S.T. N° 5</a>
        </form>
        </div>
    </div>
</body>
</html>