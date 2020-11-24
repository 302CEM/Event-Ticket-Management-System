<?php

// This script is the base script for all functions that is
// included in most pages in this projct.

session_start();
include_once('../Classes/dbClass.php');

$db = new DB;


function request_is_get() {
	return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function request_is_post() {
	return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirect_to($new_location) {
	header( "Location: $new_location" );
	exit;
  }


function request_ip_matches_session() {
	// return false if either value is not set
	if(!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])) {
		return false;
	}
	if($_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
		return true;
	} else {
		return false;
	}
}

// Does the request user agent match the stored value?
function request_user_agent_matches_session() {
	// return false if either value is not set
	if(!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])) {
		return false;
	}
	if($_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']) {
		return true;
	} else {
		return false;
	}
}

// Has too much time passed since the last login?
function last_login_is_recent() {
	$max_elapsed = 60 * 60 * 24; // 1 day
	// return false if value is not set
	if(!isset($_SESSION['last_login'])) {
		return false;
	}
	if(($_SESSION['last_login'] + $max_elapsed) >= time()) {
		return true;
	} else {
		return false;
	}
}

// Should the session be considered valid?
function is_session_valid() {
	$check_ip = true;
	$check_user_agent = true;
	$check_last_login = true;

	if($check_ip && !request_ip_matches_session()) {
		return false;
	}
	if($check_user_agent && !request_user_agent_matches_session()) {
		return false;
	}
	if($check_last_login && !last_login_is_recent()) {
		return false;
	}
	return true;
}

// If session is not valid, end and redirect to login page.
function confirm_session_is_valid() {
	if(!is_session_valid()) {
		end_session();
		// Note that header redirection requires output buffering
		// to be turned on or requires nothing has been output
		// (not even whitespace).
		header("Location: err.php");
		exit;
	}
}


function end_session() {
	// Use both for compatibility with all browsers
	// and all versions of PHP.
	session_unset();
  session_destroy();
}

function admin_logged_in(){
	return (isset($_SESSION['adminId']));
}
// Is user logged in already?
function user_logged_in() {

	return (isset($_SESSION['userId']));
}

// If user is not logged in, end and redirect to login page.
//function confirm_user_logged_in() {
	//if(!user_logged_in()) {
	//	end_session();
		// Note that header redirection requires output buffering
		// to be turned on or requires nothing has been output
		// (not even whitespace).
	//	header("Location: err.php");
		//exit;
	//}
//}


// Actions to preform after every successful login
function after_successful_login() {
	// Regenerate session ID to invalidate the old one.
	// Super important to prevent session hijacking/fixation.
	session_regenerate_id(true);

	// Save these values in the session, even when checks aren't enabled


}

function email_exists($email){

	$db = new DB;
	$stmt = $db->pdo->prepare("SELECT email FROM users WHERE email = '$email';");
		$stmt->execute();
		$rowcount = $stmt->rowCount();
		$emailExists = ($rowcount > 0);

		if($emailExists){
			return TRUE;
		}else{
			return FALSE;
		}
}

function get_user_by_id($id){
	$db = new DB;
	$stmt = $db->pdo->query("SELECT firstName, lastName FROM users WHERE id = $id;");
	$stmt->execute();
	$rowcount = $stmt->rowCount();
	$userExists = ($rowcount > 0);
	if($userExists){
	$result =	$stmt->fetch(PDO::FETCH_ASSOC);


		$output = $result['firstName'] . " " . $result['lastName'];

	}
		return $output;
	}

	function get_admin_by_id($id){
		$db = new DB;
		$stmt = $db->pdo->query("SELECT firstName, lastName FROM admins WHERE id = $id;");
		$stmt->execute();
		$rowcount = $stmt->rowCount();
		$adminExists = ($rowcount > 0);
		if($adminExists){
		$result =	$stmt->fetch(PDO::FETCH_ASSOC);


			$output = $result['firstName'] . " " . $result['lastName'];

		}
			return $output;
		}

function get_tickets_by_user_id($id){

	$db = new DB;
		$stmt = $db->pdo->query("SELECT * FROM tickets WHERE ticket_holder = $id;");
		$stmt->execute();
		$rowcount = $stmt->rowCount();
		$ticketExists = ($rowcount > 0);
		if($ticketExists){
		$result =	$stmt->fetchAll(PDO::FETCH_ASSOC);


		return $result;

		}

		}


 function find_user_by_email($email){
	$db = new DB;
	$stmt = $db->pdo->query("SELECT * FROM users WHERE email = '$email' LIMIT 1;");
	$stmt->execute();
	$rowcount = $stmt->rowCount();
		$userExists = ($rowcount > 0);
		if($userExists){
		$user =	$stmt->fetch(PDO::FETCH_ASSOC);


		return $user;

 }
}


function login($email, $password) {
	$db = new DB;
	$stmt = $db->pdo->prepare("SELECT id FROM users WHERE email = ? AND password = ? ;");
	$stmt->execute(array($email, $password));
	$rowcount = $stmt->rowCount();
	$userLoggedIn = ($rowcount == 1);
		if ($userLoggedIn) {
		 $userId = $stmt->fetchColumn();

		if($userId){
			$_SESSION['userId'] = $userId;
			return $userId;
	}
}
}




?>
