<?php
// app/config/config_test.php
$configuration->loadFromExtension('doctrine', array(
    'dbal' => array(
        'host'     => 'localhost',
        'dbname'   => 'cars_test',
        'user'     => 'root',
        'password' => 'mypassword',
    ),
));