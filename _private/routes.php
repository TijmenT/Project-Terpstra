<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes (alle URL's die je op je website hebt) en welke controller en functie deze pagina afhandelt
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	SimpleRouter::get( '/', 'LoginController@loginForm' )->name( 'login.form' );
	
	SimpleRouter::get( '/register', 'RegisterController@registrationForm' )->name( 'register.form' );
	SimpleRouter::post( '/register/verwerken', 'RegisterController@registrationprocess' )->name( 'register.process' );

	SimpleRouter::get( '/login', 'LoginController@loginForm' )->name( 'login.form' );
	SimpleRouter::post( '/login/verwerken', 'LoginController@handleLoginForm' )->name( 'login.handle' );
	SimpleRouter::get('/ingelogd/dashboard', 'LoginController@userDashboard')->name( 'login.dashboard' );
	SimpleRouter::get('/logout', 'LoginController@logout')->name( 'logout' );

	SimpleRouter::get('/agenda', 'AgendaController@AgendaDashboard')->name( 'agenda.dashboard' );



	// STOP: Tot hier al je eigen URL's zetten, dit stukje laat de 4040 pagina zien als een route/url niet kan worden gevonden.
	SimpleRouter::get( '/not-found', function () {
		http_response_code( 404 );

		return '404 Page not Found';
	} );

} );


// Dit zorgt er voor dat bij een niet bestaande route, de 404 pagina wordt getoond (die hierboven als route staat ingesteld)
SimpleRouter::error( function ( Request $request, \Exception $exception ) {
	if ( $exception instanceof NotFoundHttpException && $exception->getCode() === 404 ) {
		response()->redirect( site_url() . '/not-found' );
	}

} );

