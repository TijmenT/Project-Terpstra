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
class ItemController {

    public function ItemDashboard(){

        loginCheck();
        $template_engine = get_template_engine();
		echo $template_engine->render('item.controller');
    }

    public function ItemHistory(){

        loginCheck();
        $template_engine = get_template_engine();
		echo $template_engine->render('history');
    }


    public function itemregistrationprocess(){
		
		
    $result = itemvalidateRegistationData($_POST);


    if ( count( $result['errors'] ) === 0 ) {
        createItem($result['data']['klant'], $result['data']['aantaluren'], $result['data']['cleaner'], $result['data']['algenpro'], $result['data']['greenboost'], $result['data']['mixprof'], $result['data']['potgrond'], $result['data']['bestrijding'], $result['data']['machine'], $result['data']['stort'], $result['data']['extra'], $result['data']['workdate'], $result['data']['userid']);
        
    } else {
            $errors['username'] = 'Deze registratie bestaat al';
        }
    
    }



}

