<!DOCTYPE html>
<!--https://foundation.zurb.com/sites/docs/ --> 
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Projet</title>

    <link rel="stylesheet" href="../../assets/stylesheets/foundation.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/layout.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/contact.css" type="text/css">
</head>
<body class="hide">
<div class="grid-y grid-frame">

    <div class="cell shrink" id="topbar">
        <div class="grid-container full">
            <div class="grid-x">

                <div class="cell topbar-left">
                    <p class="text-center h4 title"></p>
                </div>

                <div class="cell auto topbar-center">
                    <div class="h4" id="toggle-sidebar-btn-parent"><i class="fa fa-bars" id="toggle-sidebar-btn" aria-hidden="true"></i></div>
                </div>

                <div class="cell shrink topbar-right">
                    <button class="button" id="user-btn" type="button" data-toggle="user-dropdown">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        <?php
                            session_start();
                            echo $_SESSION['Nom'];
                        ?>
                    </button>
                    <div class="dropdown-pane" id="user-dropdown" data-dropdown data-close-on-click="true">
                        <div class="button-group expanded small" style="margin-bottom: 0">
                            <a class="button" data-method="delete">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                Disconnect
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="cell auto">
        <div class="grid-x" style="height: 100%">

            <div class="cell shrink" id="sidebar">
                <div class="grid-y grid-frame">

                    <div class="cell auto">
                        <ul class="vertical menu sidebar-menu">
                            <li>
                                <a class="sidebar-btn active" id="editors-btn" href="../editors/index.php">
                                    <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Editeurs</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-btn" id="reservations-btn" href="../reservations/index.php">
                                    <i class="fa fa-calendar fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Réservations</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-btn" id="alerts-btn">
                                    <i class="fa fa-exclamation fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Alertes</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-btn" id="spaces-btn" href="../spaces/index.php">
                                    <i class="fa fa-exclamation fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Espaces</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="cell shrink">
                        <ul class="vertical menu sidebar-menu">
                            <li>
                                <a class="sidebar-btn" id="infos-btn" href="../infos/show.php">
                                    <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Infos</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="cell auto">
                <div class="grid-y grid-frame">
                    
                    <div class="cell shrink title-cell">
                        <h5 style="margin: 0">
                            Modification
                            <?php
                            require ('../../controlers/connect_bdd.php');

                            $id = $_GET['id'];
                            $query = 'SELECT * FROM game WHERE ID_Game = "'.$id.'"';
                            $result = $bdd->query($query);
                            $data = $result->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($data as $value) {
                                echo $value['Name'];
                            }

                            $result->closeCursor();
                            unset($result);
                            ?>
                        </h5>
                    </div>
                    <div class="cell auto content-cell">
                        <div class="grid-container full">
                            <div class="grid-x">
                                <div class="cell auto">
                                    <form id="FormEditEditor" action="../../controlers/update_games.php" method="post">
                                        <div class="grid-x grid-margin-x">
                                            <?php
                                                require ('../../controlers/connect_bdd.php');

                                                $id = $_GET['id'];
                                                $query = 'SELECT * FROM game WHERE ID_Game = "' . $id . '"';
                                                $result = $bdd->query($query);
                                                $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                                $result->closeCursor();
                                                unset($result);

                                                echo '
                                                <div class="cell auto">
                                                    <h3>Informations du jeu</h3>
                                                    <label>Titre :
                                                        <input name="name" id="GameTitleEdit" type="text" placeholder="Titre" value="'.$data[0]['Name'].'" required>
                                                    </label>
                                                    <label>Description :</label>
                                                    <textarea name="rules" type="textfield" id="GameDescEdit" placeholder="Description du jeu" value="'.$data[0]['Rules'].'"></textarea>
                                                    <label>Quantité :</label>
                                                    <input name="quantity" id="GameQtyEdit" type="number" value="'.$data[0]['Quantity'].'" min="0">
                                                    <label>Taille :
                                                        <select name="size" required>';
                                                if ($data[0]['ID_GameSize'] == 1) {
                                                    echo '
                                                        <option value="1" selected>Petit</option>
                                                        <option value="2">Moyen</option>
                                                        <option value="3">Surdimensionné</option>';
                                                } else if ($data[0]['ID_GameSize'] == 2) {
                                                    echo '
                                                        <option value="1">Petit</option>
                                                        <option value="2" selected>Moyen</option>
                                                        <option value="3">Surdimensionné</option>';
                                                } else if ($data[0]['ID_GameSize'] == 3) {
                                                    echo '
                                                        <option value="1">Petit</option>
                                                        <option value="2">Moyen</option>
                                                        <option value="3" selected>Surdimensionné</option>';
                                                } 
                                                echo '
                                                    </select>
                                                </label>
                                                <label>Type :
                                                    <select name="type" required>';
                                                if ($data[0]['ID_GameType'] == 1) {
                                                    echo '
                                                        <option value="1" selected>Occasionnel/Famille</option>
                                                        <option value="2">Ambiance</option>
                                                        <option value="3">Expert</option>
                                                        <option value="4">Enfant</option>
                                                        <option value="5">Classique</option>';
                                                } else if ($data[0]['ID_GameType'] == 2) {
                                                    echo '
                                                        <option value="1">Occasionnel/Famille</option>
                                                        <option value="2" selected>Ambiance</option>
                                                        <option value="3">Expert</option>
                                                        <option value="4">Enfant</option>
                                                        <option value="5">Classique</option>';
                                                } else if ($data[0]['ID_GameType'] == 3) {
                                                    echo '
                                                        <option value="1">Occasionnel/Famille</option>
                                                        <option value="2">Ambiance</option>
                                                        <option value="3" selected>Expert</option>
                                                        <option value="4">Enfant</option>
                                                        <option value="5">Classique</option>';
                                                } else if ($data[0]['ID_GameType'] == 4) {
                                                    echo '
                                                        <option value="1">Occasionnel/Famille</option>
                                                        <option value="2">Ambiance</option>
                                                        <option value="3">Expert</option>
                                                        <option value="4" selected>Enfant</option>
                                                        <option value="5">Classique</option>';
                                                } else if ($data[0]['ID_GameType'] == 5) {
                                                    echo '
                                                        <option value="1">Occasionnel/Famille</option>
                                                        <option value="2">Ambiance</option>
                                                        <option value="3">Expert</option>
                                                        <option value="4">Enfant</option>
                                                        <option value="5" selected>Classique</option>';
                                                }
                                                echo '
                                                    </select>
                                                </label>
                                                <fieldset>
                                                    <legend>Est-ce une dotation ?</legend>';
                                                if ($data[0]['IsEndowment'] == true) {
                                                    echo '
                                                        <input type="radio" name="dotation" id="DotYes" value="1" required checked><label>Oui</label>
                                                        <input type="radio" name="dotation" id="DotNo" value="0" required><label>Non</label>';
                                                } else {
                                                    echo '
                                                        <input type="radio" name="dotation" id="DotYes" value="1" required><label>Oui</label>
                                                        <input type="radio" name="dotation" id="DotNo" value="0" required checked><label>Non</label>';
                                                }
                                                echo '
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Est-ce un prototype ?</legend>';
                                                if ($data[0]['IsEndowment'] == true) {
                                                    echo '
                                                        <input type="radio" name="prototype" id="ProtYes" value="1" required checked><label>Oui</label>
                                                        <input type="radio" name="prototype" id="ProtNo" value="0" required><label>Non</label>';
                                                } else {
                                                    echo '
                                                        <input type="radio" name="prototype" id="ProtYes" value="1" required><label>Oui</label>
                                                        <input type="radio" name="prototype" id="ProtNo" value="0" required checked><label>Non</label>';
                                                }
                                                echo '    
                                                    </fieldset>
                                                </div>
                                                ';
                                            ?>
                                        </div>
                                        <input type="submit" value="Enregistrer" class="button"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../assets/javascript/jquery.js"></script>
<script type="text/javascript" src="../../assets/javascript/jquery.session.js"></script>
<script type="text/javascript" src="../../assets/javascript/foundation.js"></script>
<script type="text/javascript" src="../../assets/javascript/layout.js"></script>
<script type="text/javascript" src="../../assets/javascript/games.js"></script>
</body>
</html>