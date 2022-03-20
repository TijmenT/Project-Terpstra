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

class KlantController {

    public function KlantDashboard(){

        loginCheck();
        $template_engine = get_template_engine();
		echo $template_engine->render('klant.controller');
    }


    public function klantregistrationprocess(){
		
		
        $result = klantvalidateRegistationData($_POST);
    
    
        if ( count( $result['errors'] ) === 0 ) {
            createKlant($result['data']['name'], $result['data']['location']);
            
        } else {
                $errors['username'] = 'Deze klant bestaat al';
            }
        
        }
    
}




