<?php

//Connexion à la base de donné
function connectDB()
{
    $host = 'localhost';
    $dbname = 'allodonkeycine';
    $user = 'root';
    $password = '';
    return $dbh = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $password);
}


//Un tableau contenant tous les films de la base de donné
function listMovies()
{
    $dbh = connectDB();
    $sth = $dbh->prepare('SELECT * FROM film');
    $sth->execute();
    $listMovies = $sth->fetchAll();
    return $listMovies;
}

//Un tableau contenant les films actuellement diffusés
function currentMovies()
{
    $dbh = connectDB();
    $sth = $dbh->prepare('SELECT * FROM film where diffusion =1');
    $sth->execute();
    $currentMovies = $sth->fetchAll();
    return $currentMovies;
}

function selectedMovie($idMovie)
{
    $dbh = connectDB();
    $sth = $dbh->prepare('SELECT * FROM film where idfilm= :id');
    $sth->bindParam(':id', $idMovie);
    $sth->execute();
    $idMovie = $sth->fetch();
    return $idMovie;
}

//Permet à un utilisateur de se connecter en donnait un surnom OU un mot de passe, et un mot de passe
function login($user, $password)
{
    $dbh = connectDB();
    $sth = $dbh->prepare('SELECT * FROM utilisateur where (surnom = :surnom or email= :email) and password= :password');
    $sth->bindParam(':surnom', $user);
    $sth->bindParam(':email', $user);
    $sth->bindParam(':password', $password);
    $sth->execute();
    $userLogged = $sth->fetch();
    return $userLogged;
}


//Permet d'enregistrer la reservation d'un utilisateur à une séance
function registerReservation($userLogged, $movieSession)
{
    $dbh = connectDB();
    $sth = $dbh->prepare('INSERT INTO reservation (ID_user, ID_seance) VALUES (:id_utilisateur, :id_seance)');
    $sth->bindParam(':id_utilisateur', $userLogged['id']);
    $sth->bindParam(':id_seance', $movieSession['id']);
    $sth->execute();
}
