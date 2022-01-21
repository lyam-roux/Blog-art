<?php

require_once __DIR__.'/database.php';

function insert_user($email, $name){
    global $db;

    try {
        $db->beginTransaction();

        $query = 'INSERT INTO user (eMailUser,prenomUser,passUser,cdDroitUser) VALUES (?,?,?,?);'; //rqt
        $request = $db->prepare($query); //prepare
        $request->execute([$email,$name,"mdp","F"]); //exe
        $db->commit();
        $request->closeCursor();
    }
    catch (PDOException $e) {
        $db->rollBack();
        $request->closeCursor();
        die('Erreur insert CLASSE : ' . $e->getMessage());
    }
}

function connect_user($email){
    global $db;

    $query = 'SELECT * FROM user WHERE eMailUser = ?;'; //rediger rqt
    $result = $db->prepare($query); //preparer rqt
    $result -> execute([$email]);
    $user = $result->fetch();

    if($user) {
        setcookie('user', $user['eMailUser']);
        header('Location: hoome.php');
    }
}


function get_user_name($email){
    global $db;
    $query = 'SELECT * FROM user WHERE eMailUser = ?;'; //rediger rqt
    $result = $db->prepare($query); //preparer rqt
    $result -> execute([$email]);
    $user = $result->fetch();
    return $user['prenomUser'];
}


function create_post($libPost,$descPost,$emailCookie) {
    global $db;
    $db->beginTransaction();
    
    $query = 'INSERT INTO post (libPost,descripPost,eMailUser) VALUES (?,?,?);'; //rqt
    $request = $db->prepare($query); //prepare
    $request->execute([$libPost,$descPost,$emailCookie]); //exe
    $db->commit();
    $request->closeCursor();
}



function select_all() {
    global $db;

    $query = 'SELECT * FROM post;'; //rediger rqt
    $result = $db->query($query); //preparer rqt
    $liste = $result->fetchAll();
    return($liste);
  }



  function like($email,$numpost,$likepost){
    global $db;
    $db->beginTransaction();
    
    $query = 'INSERT INTO likepost(eMailUser,numPost,likePost) VALUES (?,?,?);'; //rqt
    $request = $db->prepare($query); //prepare
    $request->execute([$email,$numpost,$likepost]); //rqt
    $db->commit();
    $request->closeCursor();
    echo("done");
  }
