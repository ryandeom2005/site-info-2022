<?php
    $serveur = "localhost";
    $dbname = "4tt_ryan";
    $user = "ryan";
    $pass = "ryan5";
    
    $pseudo = $_POST["pseudo"];
    $mail = $_POST["mail"];
    $mpd= md5($_POST["mdp"]);

    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
        $sth = $dbco -> prepare("INSERT INTO site_info_2022(pseudo, mail, mdp)
        VALUES ( '$pseudo', '$mail', '$mdp')");
        $sth->bindParam(':pseudo',$pseudo);
        $sth->bindParam(':mail',$mail);
        $sth->bindParam(':mdp',$mdp);
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
        header('Location: ../HTML/index-langue.html');
		die;
    }
    catch(PDOException $e){
        echo 'Unable to process the data. Error : '.$e->getMessage();
    }
?>