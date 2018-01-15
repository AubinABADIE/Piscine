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
                            <a class="button" data-method="delete">
                                <i class="fa fa-sign-out" aria-hidden="true" id="disconnect-btn"></i>
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
                        <h5 style="margin: 0">Modification de l'espace</h5>
                    </div>
                    <div class="cell auto content-cell">
                        <div class="grid-container full">
                            <div class="grid-x grid-margin-x">
                                <div class="cell auto">
                                    <h5>Modification d'une zone de type de jeu</h5>
                                   <form id="FormEditSpaceType">
                                    <?php 
                                        require ('../../controlers/connect_bdd.php');

                                        $id = $_GET['id'];
                                        $query = 'SELECT s.*, t.Label AS Type FROM space s INNER JOIN gametype t ON (s.ID_GameType = t.ID_GameType) WHERE ID_Space = "'.$id.'"';
                                        $result = $bdd->query($query);
                                        $data = $result->fetchAll(PDO::FETCH_ASSOC);
            
                                        foreach ($data as $value) {
                                            echo $value['Name'];
                                        }
            
                                        $result->closeCursor();
                                        unset($result);

                                        echo '
                                        <label>Libellé :
                                           <input name="Lib1" id="EditTypeName" type="text" value="'.$data[0]['Label'].'" required>
                                        </label>
                                        <label>Type de jeu :
                                            <select id="EditType">';
                                           
                                        
                                        $result2 = $bdd->query('SELECT * FROM gametype');
                                        $data2 = $result2->fetchAll(PDO::FETCH_ASSOC);


                                        foreach ($data2 as $value2) {
                                            echo '<option value="'.$value2['ID_GameType'].'" ';
						if ($value2['ID_GameType'] == $data[0]['ID_GameType'])
						{
							echo "selected";
						}
						echo '>'.$value2['Label'].'</option>';
                                        }

                                        $result2->closeCursor();
                                        unset($result2);

                                        echo '
                                            </select>
                                        </label>
                                        ';
                                    ?>
                                       
                                       <input type="submit" class="button" value="Enregistrer">
                                   </form>
                                </div>
                                <div class="cell auto">
                                    <h5>Modification d'une zone éditeur</h5>
                                    <form id="FormEditSpaceEditor">
                                        <?php 
                                            require ('../../controlers/connect_bdd.php');
                                            $id = $_GET['id'];
                                            $query = 'SELECT s.*, e.Name FROM space s INNER JOIN editor e ON (s.ID_Editor = e.ID_Editor) WHERE ID_Space = "'.$id.'"';
                                            $result = $bdd->query($query);
                                            $data = $result->fetchAll(PDO::FETCH_ASSOC);
                
                                            foreach ($data as $value) {
                                                echo $value['Name'];
                                            }
                
                                            $result->closeCursor();
                                            unset($result);

                                            echo '
                                            <label>Libellé :
                                            <input name="Lib1" id="EditTypeName" type="text" value="'.$data[0]['Label'].'" required>
                                            </label>
                                            <label>Editeur associé :
                                                <select id="EditEditor" required>
                                                <option value="'.$data[0]['ID_Editor'].'" selected>'.$data[0]['Name'].'</option>';

                                                    $result = $bdd->query('SELECT * FROM editor');
                                                    $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                                    foreach ($data as $value) {
                                                        echo '<option value="'.$value['ID_Editor'].'">'.$value['Name'].'</option>';
                                                    }

                                                    $result->closeCursor();
                                                    unset($result);
                                            echo '
                                                </select>
                                            </label>
                                            ';
                                                ?>
                                            </select>
                                        </label>
                                        <input type="submit" class="button" value="Enregistrer">
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
<script type="text/javascript" src="../../assets/javascript/spaces.js"></script>
<script type="text/javascript" src="../../assets/javascript/sessions.js"></script>
</body>
</html>
