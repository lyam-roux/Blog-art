<?php



//constante def
  $hostBD = "localhost";
  $nomBD = "mmiblog22";
  $serverBD = "mysql:dbname=$nomBD;host=$hostBD;charset=utf8";
  $userBD = 'root';         //  login
  $passBD ="";         // mots de Pass

  //connection bdd
  try {
    $db = new PDO($serverBD, $userBD, $passBD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
  } catch (PDOException $err) {
    die('Echec connexion DB : ' . $err->getMessage());
  }

