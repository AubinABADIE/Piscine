<?php
    require ('../../controlers/session_verif.php');
?>

<!DOCTYPE html>
<!--https://foundation.zurb.com/sites/docs/ --> 
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Projet Piscine - Editeur</title>

    <link rel="stylesheet" href="../../assets/stylesheets/foundation.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/layout.css" type="text/css">
    <link rel="stylesheet" href="../../assets/stylesheets/editors.css" type="text/css">
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
                                <a class="sidebar-btn" id="lodgment-btn" href="../lodgments/index.php">
                                    <i class="fa fa-bed fa-fw" aria-hidden="true"></i>
                                    <span class="sidebar-menu-text">Logements</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-btn" id="spaces-btn" href="../spaces/index.php">
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
                        <h5 style="margin: 0">
                            Consultation
                            <?php
                                require ('../../controlers/connect_bdd.php');

                                $id = $_GET['id'];
                                $query = 'SELECT * FROM editor WHERE ID_Editor = "'.$id.'"';
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
                        <div class="button-group">
                            <?php
                                $id = $_GET['id'];
                                
                                foreach ($data as $value) {
                                    echo '<a class="button" href="edit.php?id='.$id.'">Modifier</a>';
                                    echo '<a class="button alert" id="delete-editor-btn" name="'.$id.'">Supprimer</a>';
                                }
                            ?>
                        </div>

                        <div class="grid-container full">
                            <div class="grid-x grid-margin-x">

                                <div class="cell auto">
                                    <div class="card">
                                        <div class="card-divider">
                                            <h4>Editeur</h4>
                                        </div>
                                        <div class="card-section">
                                            <?php
                                                require ('../../controlers/connect_bdd.php');

                                                $id = $_GET['id'];
                                                $result = $bdd->query('SELECT * FROM editor WHERE ID_Editor = "'.$id.'"');
                                                $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($data as $value) {
                                                    echo '<p><b>Nom : </b>'.$value['Name'].'</p>';
                                                    echo '<p><b>Email : </b>'.$value['Email'].'</p>';
                                                    echo '<p><b>Téléphone : </b>'.$value['Phone'].'</p>';
                                                    echo '<p><b>Adresse : </b>'.$value['Address'].' '.$value['Postal_Code'].' '.$value['Town'].'</p>';
                                                }

                                                $result->closeCursor();
                                                unset($result);
                                            ?>
                                            <br>
                                            <h5><b>Contacts :</b></h5>
                                            <table class="selectable" id="contacts-table">
                                                <thead>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Poste</th>
                                                    <th>Adresse mail</th>
                                                    <th>Téléphone</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        require ('../../controlers/connect_bdd.php');

                                                        $id = $_GET['id'];
                                                        $result = $bdd->query('SELECT * FROM contact WHERE ID_Editor = "'.$id.'"');
                                                        $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($data as $value) {
                                                            echo '<tr id="'.$value['ID_Contact'].'">';
                                                            echo '<td>'.$value['Lastname'].'</td>';
                                                            echo '<td>'.$value['Firstname'].'</td>';
                                                            echo '<td>'.$value['Job'].'</td>';
                                                            echo '<td>'.$value['Email'].'</td>';
                                                            echo '<td>'.$value['Phone'].'</td>';
                                                            echo '</tr>';
                                                        }

                                                        $result->closeCursor();
                                                        unset($result);
                                                    ?>
                                                </tbody>
                                            </table>
                                            <div class="button-group" id="contact-action-btn">
                                                <a class="button" id="edit-contact-btn">Modifier</a>
                                                <?php
                                                   $id = $_GET['id'];
                                                   echo '<a class="button" href="../contacts/new.php?id='.$id.'">Ajouter</a>'
                                                ?>
                                                <a class="button alert" id="delete-contact-btn">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-divider">
                                            <h4>Réservations enregistrées</h4>
                                        </div>
                                        <div class="card-section">
                                            <table id="booking-table">
                                                <thead>
                                                    <th>Numéro</th>
                                                    <th>Date</th>
                                                    <th>Annulé</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        require ('../../controlers/connect_bdd.php');
                                                    
                                                        $id = $_GET['id'];
                                                    
                                                        $result = $bdd->query('SELECT b.* FROM booking b INNER JOIN editor e ON (b.ID_Editor = e.ID_Editor) WHERE e.ID_Editor = "'.$id.'"');
                                                        $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($data as $value) {
                                                            echo '<tr class="clickable" id="'.$value['ID_Booking'].'">';
                                                            echo '<td>'.$value['ID_Booking'].'</td>';
                                                            echo '<td>'.$value['Date_Booking'].'</td>';
                                                            if ($value['Is_Canceled'] == TRUE) {
                                                                echo '<td>Oui</td>';
                                                            } else {
                                                                echo '<td>Non</td>';
                                                            }
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
                                            <h4>Prise de contact</h4>
                                        </div>
                                        <div class="card-section">
                                            <?php
                                                require ('../../controlers/connect_bdd.php');
                                            
                                                $id = $_GET['id'];

                                                $result = $bdd->query('SELECT t.* FROM trace t INNER JOIN editor e ON (t.ID_Editor = e.ID_Editor) WHERE e.ID_Editor = "'.$id.'"');
                                                $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($data as $value) {
                                                    echo '<p>Date premier contact : '.$value['Date_First_Contact'].'</p>';
                                                    echo '<p>Date second contact : '.$value['Date_Second_Contact'].'</p>';
                                                    echo '<p>Date réponse : '.$value['Replied'].'</p>';
                                                }

                                                $result->closeCursor();
                                                unset($result);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="card">  
                                        <div class="card-divider">
                                            <h4>Jeux</h4>
                                        </div>
                                        <div class="card-section">
                                            <table class="selectable" id="game-table">
                                                <thead>
                                                    <th>Nom</th>
                                                    <th>Quantité</th>
                                                    <th>Taille</th>
                                                    <th>Type</th>
                                                    <th>Dotation</th>
                                                    <th>Prototype</th>
                                                    <th>A renvoyer</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        require ('../../controlers/connect_bdd.php');
                                                        
                                                        $id = $_GET['id'];
                                                    
                                                        $result = $bdd->query('SELECT g.*, s.Label AS Size, t.label AS Type FROM (game g INNER JOIN gamesize s ON (g.ID_GameSize = s.ID_GameSize)) INNER JOIN gametype t ON (g.ID_GameType = t.ID_GameType) WHERE g.ID_Editor = "'.$id.'"');
                                                        $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($data as $value) {
                                                            echo '<tr id="'.$value['ID_Game'].'" class="game-line">';
                                                            echo '<td>'.$value['Name'].'</td>';
                                                            echo '<td>'.$value['Quantity'].'</td>';
                                                            echo '<td>'.$value['Size'].'</td>';
                                                            echo '<td>'.$value['Type'].'</td>';
                                                            if ($value['IsEndowment'] == TRUE) {
                                                                echo '<td>Oui</td>';
                                                            } else {
                                                                echo '<td>Non</td>';
                                                            }
                                                            if ($value['IsPrototype'] == TRUE) {
                                                                echo '<td>Oui</td>';
                                                            } else {
                                                                echo '<td>Non</td>';
                                                            }
                                                            if ($value['ToReturn'] == TRUE) {
                                                                echo '<td>Oui</td>';
                                                            } else {
                                                                echo '<td>Non</td>';
                                                            }
                                                            echo '</tr>';
                                                        }

                                                        $result->closeCursor();
                                                        unset($result);
                                                    ?>
                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="button-group" id="game-action-btn">
                                                <a class="button" id="edit-game-btn">Modifier</a>
                                                <?php
                                                   $id = $_GET['id'];
                                                   echo '<a class="button" href="../games/new.php?id='.$id.'">Ajouter</a>'
                                                ?>
                                                <a class="button alert" id="delete-game-btn">Supprimer</a>
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
<script type="text/javascript" src="../../assets/javascript/editors.js"></script>
<script type="text/javascript" src="../../assets/javascript/games.js"></script>
<script type="text/javascript" src="../../assets/javascript/contacts.js"></script>
<script type="text/javascript" src="../../assets/javascript/sessions.js"></script>
</body>
</html>
