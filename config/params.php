<?php

$config = parse_ini_file('/home/tbcabagay/web.ini');

return [
    'adminEmail' => $config['vanrental_mailer_email'],
    'appTitle' => 'Galang Norte Van Rental',
];
