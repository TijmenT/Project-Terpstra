<?php

namespace Website\Controllers;

/**
 * Class WebsiteController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class LoginController {

	public function loginForm() {

		$template_engine = get_template_engine();
		echo $template_engine->render('login_form');

	}

	public function handleLoginForm() {
		$result = validateLoginData($_POST);
        if ( userNotRegistered( $result['data']['username'])) {
            $result['errors']['username'] = 'Deze gebruiker is niet bekend';
        } else {
            
            $user = getUserByUsername($result['data']['username']);
            if (password_verify($result['data']['password'], $user['password'])){
                $_SESSION['user_id'] = $user['id'];
                
                loginUser($user);
                redirect(url('login.dashboard'));
            }else{
                $result['errors']['password'] = 'Wachtwoord is incorrect.';
            }
        
        }
        $template_engine = get_template_engine();
		echo $template_engine->render('login_form', ['errors' => $result['errors']]);
    }

    public function userDashboard(){

        loginCheck();
        $template_engine = get_template_engine();
		echo $template_engine->render('user_dashboard');
    }

    public function logout() {
        logoutUser();
        redirect(url('login'));
    }

}




