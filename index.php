<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Inicio sesion</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link rel="stylesheet" href="./assets/dist/css/style.css">

    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form action="login.php" method="post">
            <h1 class="h3 mb-2 fw-normal">Bienvenido a CrackWatch </h1><br>
            <img src="./assets/brand/CrackWatch.png" width="300px" alt="">
            <h2 class="h3 mb-3 fw-normal" style="color:gray">Ingrese con su cuenta</h1>

                <?php
                if (isset($_GET['mensaje'])) {
                    echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
                }
                ?>

                <div class="form-floating ">
                    <input class="form-control" id="floatingInput" placeholder="Usuario">
                    <label for="floatingInput">Cuenta</label>
                </div>
                <div class="form-floating w-100">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Contraseña</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
                <a href="create.php">Crear cuenta</a>
                <p class="mt-3 mb-3 text-muted">&copy; CrackWatch-Pedro Roberti</p>
        </form>
    </main>



</body>

</html>