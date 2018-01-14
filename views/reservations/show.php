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
                                <a class="sidebar-btn" id="editors-btn" href="../editors/index.php">
                                    <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Editeurs</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-btn active" id="reservations-btn" href="../reservations/index.php">
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
                        <h5 style="margin: 0">Réservation</h5>
                    </div>

                    <div class="cell auto content-cell">

                        <div class="button-group">
                            <a class="button" href="edit.php">Modifier</a>
                            <a class="button alert" id="delete-reservation-btn">Supprimer</a>
                        </div>

                        <div class="grid-container full">
                            <div class="grid-x grid-margin-x">

                                <div class="cell auto">
                                    <div class="card">
                                        <div class="card-divider">
                                            <h4>Logements</h4>
                                        </div>
                                        <div class="card-section">
                                            <table>
                                                <thead>
                                                    <th>Adresse</th>
                                                    <th>Capacité</th>
                                                    <th>Lits réservés</th>
                                                    <th>Prix</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        require('../../controlers/connect_bdd.php');

                                                        $id = $_GET['id'];

                                                        $result = $bdd->query('SELECT l.*, lo.Beds FROM (lodgment l INNER JOIN lodge lo ON (l.ID_Lodgment = lo.ID_Lodgment)) INNER JOIN booking b ON (lo.ID_Booking = b.ID_Booking) WHERE b.ID_Booking = "'.$id.'"');
                                                        $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($data as $value) {
                                                            echo '<tr id='.$value['ID_Lodgment'].'">';
                                                            echo '<td>'.$value['Address'].$value['Postal_Code'].$value['Town'].'</td>';
                                                            echo '<td>'.$value['Capacity'].'</td>';
                                                            echo '<td>'.$value['Beds'].'</td>';
                                                            echo '<td>'.$value['Night_Price'].'</td>';
                                                            echo '</tr>';
                                                        }

                                                        $result->closeCursor();
                                                        unset($result);
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell auto">
                                    <div class="card">
                                        <div class="card-divider">
                                            <h4>Emplacements</h4>
                                        </div>
                                        <div class="card-section">
                                            <table>
                                                <thead>
                                                    <th>Zone</th>
                                                    <th>Jeu</th>
                                                    <th>Nombre</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        require('../../controlers/connect_bdd.php');

                                                        $id = $_GET['id'];

                                                        $result = $bdd->query('SELECT s.*, g.Name, r.Quantity FROM ((space s INNER JOIN reserved_place r ON (s.ID_Space = r.ID_Space)) INNER JOIN game g ON (r.ID_Game = g.ID_Game)) INNER JOIN booking b ON (r.ID_Booking = b.ID_Booking) WHERE b.ID_Booking = "'.$id.'"');
                                                        $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($data as $value) {
                                                            echo '<tr id='.$value['ID_Space'].'">';
                                                            echo '<td>'.$value['Label'].'</td>';
                                                            echo '<td>'.$value['Name'].'</td>';
                                                            echo '<td>'.$value['Quantity'].'</td>';
                                                            echo '</tr>';
                                                        }

                                                        $result->closeCursor();
                                                        unset($result);
                                                    ?>
                                                </tbody>
                                            </table>
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
<script type="text/javascript" src="../../assets/javascript/reservations.js"></script>
</body>
</html>
