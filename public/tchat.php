<?php

session_start();
header('Content-Type: text/html');

require '../vendor/autoload.php';
require '../config/defines.php';

$jconfig = new \App\Service\Jconfig();
$bdd = new \App\Service\Bdd();

date_default_timezone_set('Europe/Paris');

if (isset($_POST['action']) && $_POST['action'] == 'refresh') {
    $result = $bdd->select('SELECT T.message, T.date, 
                                   U.role, 
                                   P.firstname, P.lastname, P.sexe, P.avatar  
                            FROM tchat AS T 
                            INNER JOIN users AS U 
                            ON T.user_id = U.id 
                            INNER JOIN profil AS P 
                            ON U.id = P.id 
                            ORDER BY T.id ASC', 'OBJ');

    echo '<div class="container-fluid container-tchat">';
    echo '<div class="row">';
    for ($i = 0; $i < count($result); ++$i) {
        if (!empty($result[$i]->avatar)) {
            $avatar = 'avatar/'.$result[$i]->avatar;
        } else {
            if ($result[$i]->sexe == 1) {
                $avatar = 'icon-homme-tchat.png';
            } else {
                $avatar = 'icon-femme-tchat.png';
            }
        }
        if ($result[$i]->role === 'user') {
            echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 py-3 text-left">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-1">
                            <div class="pb-4 avatar-pos"><img src="images/'.$avatar.'"></div>
                        </div>
                        <div class="col-11">
                            <div class="float-left"><small><em><b>'.$result[$i]->firstname.' 
                            '.ucfirst(strtolower($result[$i]->lastname)).'</b> à ecrit le 
                            '.date('d-m-Y à H:i:s', strtotime($result[$i]->date)).'</em></small>
                            </div>
                            <br>
                            <div class="float-left box-message">'.$result[$i]->message.'</div>
                        </div>
                      </div>
                    </div>
                 </div>
                 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6"></div>';
        }
        if ($result[$i]->role === 'admin') {
            echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6"></div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 py-3 text-left">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col--xs col-1">
                          <div class="pb-4 avatar-pos"><img src="images/'.$avatar.'"></div>
                        </div>
                        <div class="col-11">
                            <div class="col--float float-right">
                                <small>
                                    <em>
                                        <b>'.$result[$i]->firstname.' '.ucfirst(strtolower($result[$i]->lastname)).'</b>
                                         à ecrit le '.date('d-m-Y à H:i:s', strtotime($result[$i]->date)).'
                                    </em>
                                </small>
                            </div>
                            <br>
                            <div class="col--float float-right box-message">'.$result[$i]->message.'</div>
                        </div>
                        <div class="col--m col-1">
                            <div class="pb-4 avatar-pos"><img src="images/'.$avatar.'"></div>
                        </div>
                      </div>
                    </div>
                 </div>';
        }
    }
    echo '</div>';
    echo '</div>';
    echo '<br>';
} elseif (isset($_POST['action'])
          && isset($_POST['message'])
          && $_POST['message'] != ''
          && $_POST['action'] == 'envoi') {
    $message = htmlspecialchars($_POST['message']);
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        $values = array('user_id' => $_SESSION['user']->id, 'message' => $message, 'date' => date('Y-m-d H:i:s'));
        $bdd->insert('tchat', $values);
    }
} else {
    echo '';
}
