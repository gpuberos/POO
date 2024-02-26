<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Cours POO</title>
</head>

<body>
    <h1>Titre principal</h1>

    <!-- <form action="#" method="post">
        <label for="name">Nom d'utilisateur : </label>
        <input type="text" name="name" id="name"><br>
        <label for="pass">Choisissez un mot de passe : </label>
        <input type="password" name="pass" id="pass"><br>
        <input type="submit" value="Envoyer">
    </form> -->

    <?php
    require_once __DIR__ . '/classes/user.class.php';
    require_once __DIR__ . '/classes/admin.class.php';

    // if ($_SERVER["REQUEST_METHOD"] >= "POST") {
    //     // + Vérification des données reçues (regex + filtres)
    //     // + Stockage des données (base de données)

    //     $pierre = new User($_POST['name'], $_POST['pass']);

    //     echo $pierre->getName() . '<br>';

    // }

    $pierre = new Admin('Pierre', 'abcdef');
    $mathilde = new User('Mathilde', '123456');

    echo $pierre->getName() . '<br>';
    echo $mathilde->getName() . '<br>';

    $pierre->setBan('Paul');
    $pierre->setBan('Jean');
    echo $pierre->getBan();

    ?>

    <p>Un paragraphe</p>

</body>

</html>