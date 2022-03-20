<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function getUsers() {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `users`";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}

function getUserByUsername($username){

	$connection = dbConnect();
	$sql        = "SELECT * FROM `users` WHERE username = :username";
	$statement = $connection->prepare($sql);
	$statement->execute( ['username' => $username]);


	if ($statement->rowCount() === 1 ) {
		return $statement->fetch();
	}

	return false;

}

function GetKlantById($klantid){
	$connection = dbConnect();
	$sql        = "SELECT * FROM `klanten` WHERE id = :id";
	$statement = $connection->prepare($sql);
	$statement->execute( ['id' => $klantid]);
	if ($statement->rowCount() === 1 ) {
		return $statement->fetch();
	}

	return false;
}

function getUserById($id){

	$connection = dbConnect();
	$sql        = "SELECT * FROM `users` WHERE id = :id";
	$statement = $connection->prepare($sql);
	$statement->execute( ['id' => $id]);


	if ($statement->rowCount() === 1 ) {
		return $statement->fetch();
	}

	return false;
	
}
