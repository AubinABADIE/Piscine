<?php
    require ('../../controlers/session_verif.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Projet Piscine - Espace</title>

    <link rel="stylesheet" href="../../assets/stylesheets/foundation.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/layout.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/spaces.css" type="text/css">
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
                            <a class="button" id="disconnect-btn" data-method="delete">
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
                                <a class="sidebar-btn" id="editors-btn" href="../editors/index.php">
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
                                <a class="sidebar-btn" id="lodgment-btn" href="../lodgments/index.php">
                                    <i class="fa fa-bed fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Logements</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-btn active" id="spaces-btn" href="index.php">
                                    <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Espaces</span>
                                </a>
                            </li>
                            <!-- 
                            <li>
                                <a class="sidebar-btn" id="alerts-btn">
                                    <i class="fa fa-exclamation fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Alertes</span>
                                </a>
                            </li> -->
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
                        <h5 style="margin: 0">Espaces</h5>
                    </div>
                    <div class="cell auto content-cell">
                        <div class="grid-container full">
                            <div class="grid-x grid-margin-x">
                                <div class="cell auto">
                                    <p>
                                        <b>Nombre d'emplacements réservés : </b>
                                        <?php
                                            require('../../controlers/connect_bdd.php');

                                            $result = $bdd->query('SELECT Quantity FROM reserved_place');
                                            $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                            $qty = 0;
                                            foreach ($data as $value) {
                                                $qty += $value['Quantity'];
                                            }
                                            echo $qty;

                                            $result->closeCursor();
                                            unset($result);
                                        ?>
                                    </p>
                                    <br>
                                    <div class="card">
                                        <div class="card-divider">
                                            <h4>Zones types</h4>
                                        </div>
                                        <div class="card-section">
                                            <div class="table-scroll">
                                                <table class="selectable" id="spacetype-table" style="width: 100%">
                                                    <thead>
                                                        <th>Nom</th>
                                                        <th>Type de jeu</th>
                                                        <th>Nombre d'emplacements réservés</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            require ('../../controlers/select_spacetype.php');
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <div class="button-group inline" id="space-action-btn">
                                                    <a class="button" id="edit-spacetype-btn">Modifier</a>
                                                    <a class="button" href="new.php">Ajouter</a>
                                                    <a class="button alert" id="delete-spacetype-btn">Supprimer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell auto">
                                    <p>
                                        <b>Capacité du festival : </b>
                                        <?php
                                            require('../../controlers/connect_bdd.php');

                                            $result = $bdd->query('SELECT Capacity FROM festival');
                                            $data = $result->fetchAll(PDO::FETCH_ASSOC);
                                        
                                            echo $data[0]['Capacity'];

                                            $result->closeCursor();
                                            unset($result);
                                        ?>
                                    </p>
                                    <br>
                                    <div class="card">
                                        <div class="card-divider">
                                            <h4>Zones éditeurs</h4>
                                        </div>
                                        <div class="card-section">
                                            <div class="table-scroll">
                                                <table class="selectable" id="spaceeditor-table" style="width: 100%">
                                                    <thead>
                                                        <th>Nom</th>
                                                        <th>Editeur</th>
                                                        <th>Nombre d'emplacements réservés</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            require ('../../controlers/select_spaceeditor.php');
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <div class="button-group inline" id="space-action-btn">
                                                    <a class="button" id="edit-spaceeditor-btn">Modifier</a>
                                                    <a class="button" href="new.php">Ajouter</a>
                                                    <a class="button alert" id="delete-spaceeditor-btn">Supprimer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<script type="text/javascript" src="../../assets/javascript/spaces.js"></script>
<script type="text/javascript" src="../../assets/javascript/sessions.js"></script>
</body>
</html>
