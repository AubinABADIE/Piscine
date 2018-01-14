<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Projet Piscine - Infos</title>

    <link rel="stylesheet" href="../../assets/stylesheets/foundation.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/layout.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/info.css" type="text/css">
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
                                <a class="sidebar-btn" id="spaces-btn" href="../spaces/index.php">
                                    <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Espaces</span>
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
                                <a class="sidebar-btn active" id="infos-btn" href="../infos/show.php">
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
                        <h5 style="margin: 0">Infos</h5>
                    </div>


                    <div class="cell auto content-cell">
                    <div class="grid-container full">
                            <div class="grid-x grid-margin-x">

                                <div class="cell auto">
                                    <div class="card">
                                        <div class="card-divider">
                                            <h4>Informations générales</h4>
                                        </div>
                                        <div class="card-section">
                                            <p>Cette application a été créée durant l'année 2017/2018 dans le cadre d'un projet.
                                            Elle a été conçue entièrement par 6 élèves de la section  IG3 de Polytech Montpellier.
                                            N'hésitez pas à faire remonter si vous constatez un souci sur notre  application, ou même pour toutes autres remarques.
                                            Nous sommes conscients que certaines fonctionnalités ne sont pas optimales, veuillez nous en excuser.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-divider">
                                            <h4>Contacts étudiants</h4>
                                        </div>
                                        <div class="card-section">
                                            <p>Pour contacter directement l'un des élèves, utilisez les adresses suivantes :
                                            </br>
                                            <a href="mailto:aubin.abadie@etu.umontpellier.fr">Aubin ABADIE</a> </br>
                                            <a href="mailto:paul.arnaud@etu.umontpellier.fr">Paul ARNAUD</a></br>
                                            <a href="mailto:alice.burette@etu.umontpellier.fr">Alice BURETTE</a></br>
                                            <a href="mailto:adam.megherat@etu.umontpellier.fr">Adam MEGHERAT</a></br>
                                            <a href="mailto:alexandre.kueny@etu.umontpellier.fr">Alexandre KUENY</a></br>
                                            <a href="mailto:yvan.sanson@etu.umontpellier.fr">Yvan SANSON</a></br>
                                            </p>
                                        </div>
                                </div>
                                <div class="cell auto">
                                    <div class="card">
                                        <div class="card-divider">
                                            <h4>Contacts référents</h4>
                                        </div>
                                        <div class="card-section">
                                                <p>Si vous voulez contacter nos professeurs référents : </br>
                                                <a href="mailto:christophe.fiorio@umontpellier.fr">M. Christophe FIORIO</a></br>
                                                <a href="mailto:anne-laure.villaret@umontpellier.fr">Mme. Anne-Laure VILLARET</a></br>
                                                </p>
                                               
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
<script type="text/javascript" src="../../assets/javascript/info.js"></script>
</body>
</html>
