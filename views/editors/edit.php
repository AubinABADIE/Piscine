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
                        <h5 style="margin: 0">
                            Modification
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
                        <div class="grid-container full">
                            <div class="grid-x">
                                <div class="cell auto">
									<?php
									echo '<form id="FormEditEditor" action="../../controlers/update_editors.php?id='.$GET['id'].' method="post">'
									?>
                                        <div class="grid-x grid-margin-x">
                                            <?php
                                                require ('../../controlers/connect_bdd.php');

                                                $id = $_GET['id'];
                                                $query = 'SELECT * FROM trace t INNER JOIN editor e ON (t.ID_Editor = e.ID_Editor) WHERE e.ID_Editor = "' . $id . '"';
                                                $result = $bdd->query($query);
                                                $data = $result->fetchAll(PDO::FETCH_ASSOC);

                                                $result->closeCursor();
                                                unset($result);


                                                echo '
                                                <div class="cell auto">
                                                    <h3>Informations de l\'éditeur</h3>
                                                    <label>Nom de l\'éditeur :
                                                        <input name="name" id="NomEdEdit" type="text" placeholder="Nom" value="' . $data[0]['Name'] . '" required>
                                                    </label>
                                                    <label>Adresse :
                                                        <input name="address" id="AdrEdEdit" type = "text" placeholder="N°Rue, rue" value="' . $data[0]['Address'] . '">
                                                    </label>
                                                    <label>Ville :
                                                        <input name="town" id="VilleEdEdit" type="text" placeholder="Ville" value="' . $data[0]['Town'] . '">
                                                    </label>
                                                    <label>Code Postal :
                                                        <input name="postalcode" id="CPEdEdit" type="text" placeholder="Code postal" value="' . $data[0]['Postal_Code'] . '">
                                                    </label>
                                                    <label>Mail :
                                                        <input name="email" id="MailEdEdit" type="email" placeholder="Email" value="' . $data[0]['Email'] . '">
                                                    </label>
                                                    <label>Téléphone :
                                                        <input name="phone" id="TelEdEdit" type="text" placeholder="Téléphone" value="' . $data[0]['Phone'] . '">
                                                    </label>
                                                </div>
                                                <div class="cell auto">
                                                    <h3>Dates de prise de contact</h3>
                                                    <label>Date de premier contact :
                                                        <input name="dfirst" id="DateRDV1Edit" type="date" placeholder="Premier contact"  value="' . $data[0]['Date_First_Contact'] .  '" required>
                                                    </label>
                                                    <label>Date de second contact :
                                                        <input name="dsecond" id="DateRDV2Edit" type="date" placeholder="Second contact"  value="' . $data[0]['Date_Second_Contact'] .  '">
                                                    </label>
                                                    <label>Date de réponse :
                                                        <input name="dreplied" id="DateRepEdit" type="date" placeholder="Réponse"  value="' . $data[0]['Replied'] .  '">
                                                    </label>
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
<script type="text/javascript" src="../../assets/javascript/editors.js"></script>
<script type="text/javascript" src="../../assets/javascript/sessions.js"></script>
</body>
</html>
