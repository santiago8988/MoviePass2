<?php

namespace Config;

define ("ROOT",dirname(__DIR__)."/");

//Path to your project's root folder
define("FRONT_ROOT","http://localhost/xampp/MoviePass2/");
define("VIEWS_PATH","View/");
define("CSS_PATH",FRONT_ROOT.VIEWS_PATH."css/");
define("JS_PATH",FRONT_ROOT.VIEWS_PATH."js/");
define ("IMG_PATH",FRONT_ROOT.VIEWS_PATH."img/");



define("API_KEY",'94f7bed6f537dd0417d1e789ad334b87');

define("DB_HOST", "localhost");
define("DB_NAME", "moviepass");
define("DB_USER", "root");
define("DB_PASS", "");

?>