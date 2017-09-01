<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport">
	<title>Ideas-Envision Servicios Integrales | Web Site</title>

    <meta name="geo.region" content="BO-L" />
    <meta name="geo.placename" content="Ideas-Envision Bolivia" />
    <meta name="geo.position" content="-65;-68" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">      
    <meta name="ICBM" content="37.358308, -6.051271" />
    <meta name="author" content="Ideas-Envision Servicios Integrales" /> 

    <!-- FACEBOOK METATAGS -->
    <meta property="fb:app_id"       content="1605503199677536"/>
    <meta property="og:url"          content="http://www.ideas-envision.com" />
    <meta property="og:title"        content="Ideas-Envision Servicios Integrales" />
    <meta property="og:type"        content="website" />
    <meta property="og:description"  content="Servicios de consultoria en diseño y desarrollo web a medida, diseño gráfico, social media, SEO y SEM." />
    <meta property="og:image"        content="<?Php echo $vParamsViewFrontEndLayout['root_frontend_img']; ?>logos/facebook_tag_image.png"/>    


	<link rel="shortcut icon" type="image/x-icon" href="">
	<!-- Font -->
	<link href='http://fonts.googleapis.com/css?family=Lekton:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	
	<!-- Css -->
	<link rel="stylesheet" href="<?Php echo $vParamsViewFrontEndLayout['root_frontend_css']; ?>timber.css" />
	<link rel="stylesheet" href="<?Php echo $vParamsViewFrontEndLayout['root_frontend_css']; ?>snowbridge.css" />
	<link rel="stylesheet" href="<?Php echo $vParamsViewFrontEndLayout['root_frontend_css']; ?>avalanche.css" />
	<link rel="stylesheet" href="<?Php echo $vParamsViewFrontEndLayout['root_frontend_css']; ?>templates.css" />
	<link rel="stylesheet" href="<?Php echo $vParamsViewFrontEndLayout['root_frontend_css']; ?>skin.css" />

	<!--[if lt IE 9]>
    	<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- GoogleAnalytic -->  
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-73602164-1', 'auto');
      ga('send', 'pageview');

    if (top.location!= self.location)
    {
    top.location = self.location
    }
    </script>

</head>

<body class="home-page">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=1605503199677536";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Side Navigation Menu -->
<aside id="mobile-access" class="side-navigation-wrapper enter-right">
        <div class="side-navigation-header">
                <div class="logo">
                        <a href="<?Php echo BASE_VIEW_URL; ?>"><img src="<?Php echo $vParamsViewFrontEndLayout['root_frontend_img']; ?>logos/logo.png" alt="Ideas-Envision Header Logotype" /></a>
                </div>
                <div id="side-nav-hide" class="navigation-hide">
                        <a href="#"><span class="icon-cancel medium"></span></a>
                </div>
        </div>
        <nav class="side-navigation">
            <ul>
                <?Php
                    if(isset($this->vUserNamesComplete)){
                        echo '<li>';
                            echo '<a href="#" class="contains-sub-menu">'.$this->vUserNamesComplete.'</a>';
                            echo '<ul class="sub-menu">';
                                echo '<li><a href="'.BASE_VIEW_URL.'access/LogoutMethod/">Salir</a></li>';
                            echo '</ul>';
                        echo '</li>';
                    }
                ?>                
                <li><a href="<?Php echo BASE_VIEW_URL; ?>">Principal</a></li>
                <li>
                    <a href="#" class="contains-sub-menu">Portafolio</a>
                    <ul class="sub-menu">
                        <li><a href="<?Php echo BASE_VIEW_URL; ?>portfolio/web">Desarrollo Web</a></li>
                        <li><a href="<?Php echo BASE_VIEW_URL; ?>portfolio/design">Diseño Gráfico</a></li>
                        <li><a href="<?Php echo BASE_VIEW_URL; ?>portfolio/social">Social Media</a></li>
                    </ul>
                </li>                
                <li><a href="#" class="contains-sub-menu">Proyectos</a></li>
                <li><a href="<?Php echo BASE_VIEW_URL; ?>contact">Contáctanos</a></li>
                <li><a href="<?Php echo BASE_VIEW_URL; ?>access">Ingresar</a></li>
            </ul>
        </nav>
        <div class="side-navigation-footer">
            <ul class="social-list list-horizontal">
                <li><a href="https://www.facebook.com/ideas.envision.si/" class="icon-facebook small"></a></li>
                <li><a href="https://twitter.com/ideasenvision" class="icon-twitter small"></a></li>
                <li><a href="https://plus.google.com/105131319645846689531" class="icon-gplus small"></a></li>
            </ul>
            &copy; 2016 Ideas-Envision Servicios Integrales. Todos los Derechos Reservados.
        </div>
</aside>
<!-- Side Navigation Menu End -->

<div class="wrapper">
    <div class="wrapper-inner">

    <!-- Header -->
    <header class="header-1 header" data-bkg-threshold="window-height" data-compact-threshold="window-height">
        <div class="header-inner">
            <div class="row nav-bar reveal-side-navigation">
                <div class="column width-12 nav-bar-inner">
                    <div class="logo">
                        <a href="<?Php echo BASE_VIEW_URL; ?>"><img src="<?Php echo $vParamsViewFrontEndLayout['root_frontend_img']; ?>logos/logo-dark.png" alt="Ideas-Envision Menu #1 Logotype" /></a>
                        <a href="<?Php echo BASE_VIEW_URL; ?>"><img src="<?Php echo $vParamsViewFrontEndLayout['root_frontend_img']; ?>logos/logo.png" alt="Ideas-Envision Menu #2 Logotype" /></a>
                    </div>
                    <div id="side-nav-show" class="navigation-show">
                        <a href="#"><span class="icon-menu medium"></span></a>
                    </div>
                    <nav class="navigation">
                        <ul>
                            <?Php
                                if(isset($this->vUserNamesComplete)){
                                    echo '<li><a href="'.BASE_VIEW_URL.'">'.$this->vUserNamesComplete.'</a></li>';
                                }
                            ?>
                            <li><a href="<?Php echo BASE_VIEW_URL; ?>">Inicio</a></li>
                            <li><a href="<?Php echo BASE_VIEW_URL; ?>portfolio">Portafolio</a></li>
                            <li><a href="<?Php echo BASE_VIEW_URL; ?>contact">Contáctanos</a></li>
                            <li><a href="<?Php echo BASE_VIEW_URL; ?>access">Ingresar</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->