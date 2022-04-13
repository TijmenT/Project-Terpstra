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
class InformationController {

    public function InfoDashboard(){
        loginCheck();
        $template_engine = get_template_engine();
		echo $template_engine->render('infodashboard');
    }

    public function ReturnData(){
        $result = InfoData($_GET);
        loginCheck();
        FindData($result['data']['klant'], $result['data']['periode']);
    }

}




