<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

//autoload file
require_once('vendor/autoload.php');


//Create an instance of the Base class

$f3 = Base::instance();


//Define a default route
$f3->route('GET /', function(){

    $view = new Template();
    echo $view->render('views/PetHome.html');
});

$f3->route('GET /order1', function(){


    $view = new Template();
    echo $view->render('views/PetOrder.html');
});

$f3->route('POST /order2', function(){

    // Store data in session
    $_SESSION['animal'] = $_POST['animal'];

    $_SESSION['color'] = $_POST['color'];

   $view = new Template();
    echo $view->render('views/PetOrder2.html');
});

$f3->route('POST /summary', function() {

    $_SESSION['petName'] = $_POST['petName'];
    $view = new Template();
    echo $view->render('views/OrderSummary.html');
});


//fat free
$f3->run();

