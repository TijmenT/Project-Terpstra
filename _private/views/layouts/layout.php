<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terpstra Tuinen</title>
    <link rel="stylesheet" href="<?php echo site_url( '/css/style.css' ) ?>" media="all">
	<?php if ( $this->section( 'css' ) ): ?>
		<?php echo $this->section( 'css' ) ?>
	<?php endif; ?>
    
    <link rel="icon" href="<?php echo site_url( '/images/icon.png' ) ?>">

    
</head>
<body>
    <div id="dashboard">

        <div class="item header">Header</div>
        <div class="center">
        <?php echo $this->section( 'content' ) ?>
        </div>
        



        </div>
        </div>
        
    
    </div>
    <nav>
        <input id="nav-toggle" type="checkbox">
        <div class= "Logo">
            <a href="<?php echo url( '/ingelogd/dashboard/' ) ?>"<?php if ( current_route_is( '/ingelogd/dashboard/' ) ): ?> class="active"<?php endif ?>> <img width="50px" height="50px" src="<?php echo site_url( '/images/alleenlogozwart.png' ) ?>">
            </a>
        </div>

<?php if (json_encode(isAdmin(getLoggedInUsername()))[10] == 1):?>
    <ul class = "links"> 
            <a href="<?php echo url( '/ingelogd/dashboard/' ) ?>"<?php if ( current_route_is( '/ingelogd/dashboard/' ) ): ?> class="active"<?php endif ?>>Home</a>
            <a href="<?php echo url( 'agenda' ) ?>"<?php if ( current_route_is( 'agenda' ) ): ?> class="active"<?php endif ?>>Agenda</a>
            <a href="<?php echo url( 'myinfo' ) ?>"<?php if ( current_route_is( 'myinfo' ) ): ?> class="active"<?php endif ?>>Mijn Informatie</a>
            <a href="<?php echo url( 'register' ) ?>"<?php if ( current_route_is( 'register' ) ): ?> class="active"<?php endif ?>>Gebuiker Maken</a>
            <a href="<?php echo url( 'logout' ) ?>"<?php if ( current_route_is( 'logout' ) ): ?> class="active"<?php endif ?>>Uitloggen</a>
                </ul>
    <?php else: ?>
        <ul class = "links"> 
            <a href="<?php echo url( '/ingelogd/dashboard/' ) ?>"<?php if ( current_route_is( '/ingelogd/dashboard/' ) ): ?> class="active"<?php endif ?>>Home</a>
            <a href="<?php echo url( 'agenda' ) ?>"<?php if ( current_route_is( 'agenda' ) ): ?> class="active"<?php endif ?>>Agenda</a>
            <a href="<?php echo url( 'myinfo' ) ?>"<?php if ( current_route_is( 'myinfo' ) ): ?> class="active"<?php endif ?>>Mijn Informatie</a>
            <a href="<?php echo url( 'logout' ) ?>"<?php if ( current_route_is( 'logout' ) ): ?> class="active"<?php endif ?>>Uitloggen</a>
            </ul>
        <?php endif;?>
        <label for="nav-toggle" class="icon-burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </label>
    </nav>
    
</body>
</html>