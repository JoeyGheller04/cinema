<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
</head>
<body>
    <form action="../backend/router.php" method="post">

        <input type="text" id="email"  name="email">
        <input type="text" id="password"  name="password">

        <button type="submit" value="login" name="btn">Accedi</button>
    </form>

    <form action="../backend/router.php" method="post">

        <input type="text" id="nome"  name="nome">
        <input type="text" id="cognome"  name="cognome">
        <input type="text" id="email"  name="email">
        <input type="text" id="password"  name="password">

        <button type="submit" value="register" name="btn">Registrati</button>
    </form>
</body>
</html>