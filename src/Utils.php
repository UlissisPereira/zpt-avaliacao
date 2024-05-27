<?php

require_once './User.php';
require_once './Company.php';
require_once  './Company.php';

// array classes to be used in the setDb function
$classes = array(new User\User(), new Company\Company(), new Company\Company());

setDb('db', $classes);

function setDb($db, $classes) {
    foreach ($classes as $class) {
        $class->setDb($db);
    }
}

?>
