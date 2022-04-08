<?php
// Dit bestand hoort bij de router, en bevat nog een aantal extra functies je kunt gebruiken
// Lees meer: https://github.com/skipperbent/simple-php-router#helper-functions
require_once __DIR__ . '/route_helpers.php';

// Hieronder kun je al je eigen functies toevoegen die je nodig hebt
// Maar... alle functies die gegevens ophalen uit de database horen in het Model PHP bestand

/**
 * Verbinding maken met de database
 * @return \PDO
 */
function dbConnect() {

	$config = get_config( 'DB' );

	try {
		$dsn = 'mysql:host=' . $config['HOSTNAME'] . ';dbname=' . $config['DATABASE'] . ';charset=utf8';

		$connection = new PDO( $dsn, $config['USER'], $config['PASSWORD'] );
		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

		return $connection;

	} catch ( \PDOException $e ) {
		echo 'Fout bij maken van database verbinding: ' . $e->getMessage();
		exit;
	}

}

/**
 * Geeft de juiste URL terug: relatief aan de website root url
 * Bijvoorbeeld voor de homepage: echo url('/');
 *
 * @param $path
 *
 * @return string
 */
function site_url( $path = '' ) {
	return get_config( 'BASE_URL' ) . $path;
}

function get_config( $name ) {
	$config = require __DIR__ . '/config.php';
	$name   = strtoupper( $name );

	if ( isset( $config[ $name ] ) ) {
		return $config[ $name ];
	}

	throw new \InvalidArgumentException( 'Er bestaat geen instelling met de key: ' . $name );
}

/**
 * Hier maken we de template engine en vertellen de template engine waar de templates/views staan
 * @return \League\Plates\Engine
 */
function get_template_engine() {

	$templates_path = get_config( 'PRIVATE' ) . '/views';

	$template_engine = new League\Plates\Engine( $templates_path );
	$template_engine->addFolder('layouts', $templates_path . '/layouts');

	return $template_engine;

}

/**
 * Geef de naam (name) van de route aan deze functie, en de functie geeft
 * terug of dat de route is waar je nu bent
 *
 * @param $name
 *
 * @return bool
 */
function current_route_is( $name ) {
	$route = request()->getLoadedRoute();

	if ( $route ) {
		return $route->hasName( $name );
	}

	return false;

}

function validateRegistationData($data) {

	$errors = [];
	$username = trim( $data['username'] );
	$password = trim( $data['password'] );
	$beheerder = $data['beheerder'];

	if(isset($beheerder) && $beheerder == 'Yes')
	{
    $isbeheerder = TRUE;
	}else{
	$isbeheerder = FALSE;
	}


	if ( strlen( $username ) <2 ) {
		$errors['username'] = 'Geen geldige username';
	}

	if ( strlen( $password ) <2 ) {
		$errors['password'] = 'Geen geldig wachtwoord';
	}
	

	$data = [
		'username' => $username,
		'password' => $password,
		'beheerder' => $isbeheerder
	];

	return [
		'data' => $data,
		'errors' => $errors
	];

}

function klantvalidateRegistationData($data) {

	$errors = [];
	$name = trim( $data['name'] );
	$location = trim( $data['location'] );

	if ( strlen( $name ) <2 ) {
		$errors['name'] = 'Geen geldige naam';
	}

	if ( strlen( $location ) <2 ) {
		$errors['location'] = 'Geen geldige woonplaats';
	}
	

	$data = [
		'name' => $name,
		'location' => $location
	];

	return [
		'data' => $data,
		'errors' => $errors
	];

}

function createKlant($name, $location){


	
	$connection = dbConnect();
	$sql = "INSERT INTO `klanten` (`klant`, `woonplaats`) VALUES (:name, :location)";
			$statement = $connection->prepare( $sql );
			$params = [
				'name' => $name,
				'location' => $location
				
			]; 
			$statement->execute( $params );
			header("Location: /ingelogd/dashboard/?not=Klant geregisteert!");

}

function itemvalidateRegistationData($data) {

	$errors = [];
	$klant = $data['klant'];
	$workdate = $data['workdate'];
	$aantaluren = $data['aantaluren'];
	$extra = trim($data['extra']);
	$userid = getLoggedInUsername();
	$data = [
		'klant' => $klant,
		'userid' => $userid,
		'aantaluren' => $aantaluren,
		'workdate' => $workdate,
		'extra' => $extra
	];

	return [
		'data' => $data,
		'errors' => $errors
	];

}

function createItem($klant, $aantaluren, $extra, $workdate){
	$user_id = $_SESSION['user_id'];
	$date = date('d-m-Y');
	$time = date('H:i');
	$connection = dbConnect();
	$sql = "INSERT INTO `urenregistratie` (`klantid`, `userid`, `aantaluren`, `extra`, `workdate`, `date`, `time`) VALUES (:klantid, :userid, :aantaluren, :extra, :workdate, :date, :time)";
			$statement = $connection->prepare( $sql );
			$params = [
				'klantid' => $klant,
				'userid' => $user_id,
				'aantaluren' => $aantaluren,
				'extra' => $extra,
				'workdate' => $workdate,
				'date' => $date,
				'time' => $time
			]; 
			$statement->execute( $params );
			header("Location: /ingelogd/dashboard/?not=Succesvol ingeleverd!");

}


function validateLoginData($data) {

	$errors = [];

	$username = trim( $data['username'] );
	$password = trim( $data['password'] );
	
	if ( strlen( $username ) <2 ) {
		$errors['username'] = 'Geen geldige username';
	}
	if ( strlen( $password ) <6 ) {
		$errors['password'] = 'Geen geldig wachtwoord';
	}


	

	$data = [
		'username' => $username,
		'password' => $password
	];

	return [
		'data' => $data,
		'errors' => $errors
	];

}

function userNotRegistered($username) {
 
// Checken of de gebruiker al bestaat
 
$connection = dbConnect();
$sql = "SELECT * FROM `users` WHERE `username` = :username";
$statement = $connection->prepare($sql);
$statement->execute(['username' => $username]);
 
$num_rows = $statement->rowCount();
 
return ($num_rows === 0); // True of false
 
}

	
function isAdmin($username){

	$connection = dbConnect();
	$sql        = "SELECT `admin` FROM `users` WHERE `username` = :username";
	$statement = $connection->prepare($sql);
	$statement->execute( ['username' => $username]);


	if ($statement->rowCount() === 1 ) {
		$str = json_encode($statement->fetch());
		$number = (int)filter_var($str, FILTER_SANITIZE_NUMBER_INT);
		return $number;
	}

	return false;
	
}

function createUser($username, $password, $beheerder){


	
	$connection = dbConnect();
	$sql = "INSERT INTO `users` (`username`, `password`, `admin`) VALUES (:username, :password, :admin)";
			$statement = $connection->prepare( $sql );
			$safe_password = password_hash( $password, PASSWORD_DEFAULT);
			$params = [
				'username' => $username,
				'password' => $safe_password,
				'admin' => $beheerder
				
			]; 
			$statement->execute( $params );
			header("Location: /login");
			die();
			
			

}

function loginUser($user){
	$_SESSION['user_id'] = $user['id'];
}

function logoutUser(){
	unset($_SESSION['user_id']);
}

function isLoggedIn(){
	return !empty($_SESSION['user_id']);
}

function loginCheck() {
	if ( ! isLoggedin() ) {
		$login_url = url( 'login.form' );
		redirect( $login_url);
	}
}

function getLoggedInUsername(){
	$username = "niet ingelogd";
	if ( ! isLoggedin() ) {
		return $username;
	}

	$user_id = $_SESSION['user_id'];
	$user = GetUserById($user_id);

	if ($user){
		$username = $user['username'];
	}
	return $username;
}

function getAllPosts(){
	$connection = dbConnect();
	$sql = "SELECT * FROM `blog`";
	$statement = $connection->query($sql);
	$blog = $statement->fetchAll();
	print_r($blog); exit;
}

class Calendar {

    private $active_year, $active_month, $active_day;
    private $events = [];

    public function __construct($date = null) {
        $this->active_year = $date != null ? date('Y', strtotime($date)) : date('Y');
        $this->active_month = $date != null ? date('m', strtotime($date)) : date('m');
        $this->active_day = $date != null ? date('d', strtotime($date)) : date('d');
    }

    public function add_event($txt, $date, $days = 1, $color = '') {
        $color = $color ? ' ' . $color : $color;
        $this->events[] = [$txt, $date, $days, $color];
    }

    public function __toString() {
        $num_days = date('t', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year));
        $num_days_last_month = date('j', strtotime('last day of previous month', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year)));
        $days = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat'];
        $first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $days);
        $html = '<div class="calendar">';
        $html .= '<div class="header">';
        $html .= '<div class="month-year">';
        $html .= date('F Y', strtotime($this->active_year . '-' . $this->active_month . '-' . $this->active_day));
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="days">';
        foreach ($days as $day) {
            $html .= '
                <div class="day_name">
                    ' . $day . '
                </div>
            ';
        }
        for ($i = $first_day_of_week; $i > 0; $i--) {
            $html .= '
                <div class="day_num ignore">
                    ' . ($num_days_last_month-$i+1) . '
                </div>
            ';
        }
        for ($i = 1; $i <= $num_days; $i++) {
            $selected = '';
            if ($i == $this->active_day) {
                $selected = ' selected';
            }
            $html .= '<div class="day_num' . $selected . '">';
            $html .= '<span>' . $i . '</span>';
            foreach ($this->events as $event) {
                for ($d = 0; $d <= ($event[2]-1); $d++) {
                    if (date('y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event[1]))) {
                        $html .= '<div class="event' . $event[3] . '">';
                        $html .= $event[0];
                        $html .= '</div>';
                    }
                }
            }
            $html .= '</div>';
        }
        for ($i = 1; $i <= (42-$num_days-max($first_day_of_week, 0)); $i++) {
            $html .= '
                <div class="day_num ignore">
                    ' . $i . '
                </div>
            ';
        }
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

}
?>