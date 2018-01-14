<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CONNEXION</title>

    <link rel="stylesheet" href="../../assets/stylesheets/layout.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/session.css" type="text/css">

</head>

<body>
    <nav><a href="#" class="focus">CONNEXION</a></nav>

    <form action="../../controlers/session_connect.php" method="post">

        <h2>CONNEXION</h2>

        <input name="id" type="text" class="text-field" placeholder="Identifiant"/>
        <input name="pwd" type="password" class="text-field" placeholder="Mot de passe"/>
        <input type="submit" value="Connexion" class="button"/>

    </form>

    <script type="text/javascript" src="../../assets/javascript/jquery.js"></script>
    <script type="text/javascript" src="../../assets/javascript/jquery.session.js"></script>
    <script type="text/javascript" src="../../assets/javascript/foundation.js"></script>
    <script type="text/javascript" src="../../assets/javascript/layout.js"></script>
    <script type="text/javascript" src="../../assets/javascript/sessions.js"></script>
</body>
</html>