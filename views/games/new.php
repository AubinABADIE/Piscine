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
    <link rel="stylesheet" href="../../assets/stylesheets/games.css" type="text/css">
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
                        </ul>
                    </div>
                    <div class="cell shrink">
                        <ul class="vertical menu sidebar-menu">
                            <li>
                                <a class="sidebar-btn" id="infos-btn">
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
                        <h5 style="margin: 0">Création d'un nouveau jeu</h5>
                    </div>
                    <div class="cell auto content-cell">
                        <form id="FormNewGame">
                            <label>Titre du jeu :
                                <input id="GameTitleNew" type="text" placeholder="Titre" required>
                            </label>
                            <fieldset>
                                <legend>Taille du jeu :</legend>
                                <input type="radio" name="taille" id="GameSmallNew" value="Moyen" required><label>Moyen</label>
                                <input type="radio" name="taille" id="GameBigNew" value="Grand" required><label>Grand</label>
                            </fieldset>
                            <label>Description :</label>
                            <textarea type="textfield" id="GameDescNew" placeholder="Description du jeu" required></textarea>
                           
                            <label>Type :
                                <select required>
                                    <option value="Occasionnel/Famille">Occasionnel/Famille</option>
                                    <option value="Ambiance">Ambiance</option>
                                    <option value="Expert">Expert</option>
                                    <option value="Enfant">Enfant</option>
                                    <option value="Classique">Classique</option>
                                </select>
                            </label>
                            <fieldset>
                                <legend>Dotation ?</legend>
                                <input type="radio" name="dotation" id="DotYes" value="Oui" required><label>Oui</label>
                                <input type="radio" name="dotation" id="DotNo" value="Non" required><label>Non</label>
                            </fieldset>
                            <fieldset>
                                <legend>Prototype ?</legend>
                                <input type="radio" name="prototype" id="ProtYes" value="Oui" required><label>Oui</label>
                                <input type="radio" name="prototype" id="ProtNo" value="Non" required><label>Non</label>
                            </fieldset>
                            <input type="submit" class="button" value="Enregistrer">
                        </form>
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