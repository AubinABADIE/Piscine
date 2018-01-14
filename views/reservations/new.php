<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Projet</title>

    <link rel="stylesheet" href="../../assets/stylesheets/foundation.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/layout.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/reservations.css" type="text/css">
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
                    <div class="h4" id="toggle-sidebar-btn-parent"><i class="fa fa-bars" id="toggle-sidebar-btn"
                                                                      aria-hidden="true"></i></div>
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
                        <h5 style="margin: 0">Nouvelle réservation</h5>
                    </div>

                    <div class="cell auto content-cell">

                        <form>
                            <label>
                                Editeur
                                <select>
                                    <option value="editeur1">editeur 1</option>
                                    <option value="editeur2">editeur 2</option>
                                    <option value="editeur3">editeur 3</option>
                                    <option value="editeur4">editeur 4</option>
                                </select>
                            </label>
                            <label>
                                Jeux
                                <select multiple="multiple">
                                    <option value="jeu1">jeu 1</option>
                                    <option value="jeu2">jeu 2</option>
                                </select>
                            </label>
                            <label>
                                Nombre d'emplacements
                                <input id="emplacement-number" type="number" value="1" min="0">
                            </label>
                            <label>
                                Logement ?
                                <div class="switch small">
                                    <input class="switch-input" id="logement-switch" type="checkbox">
                                    <label class="switch-paddle" for="logement-switch">
                                        <span class="switch-active" aria-hidden="true">Oui</span>
                                        <span class="switch-inactive" aria-hidden="true">Non</span>
                                    </label>
                                </div>
                            </label>
                            <div class="hide" id="logement-form">
                                <label>
                                    Nombre de places
                                    <input id="logement-number" type="number" value="1" min="0">
                                </label>
                                <label>
                                    Logement
                                    <select>
                                        <option value="logement1">logement 1</option>
                                        <option value="logement2">logement 2</option>
                                        <option value="logement3">logement 3</option>
                                        <option value="logement4">logement 4</option>
                                    </select>
                                </label>
                            </div>
                            <input type="submit" class="button" value="Créer">
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
<script type="text/javascript" src="../../assets/javascript/reservations.js"></script>
</body>
</html>