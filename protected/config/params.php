<?php

// this contains the application parameters that can be maintained via GUI
return array(
    // this is used in error pages
    'adminEmail' => 'ahmed.hany.fawzy@hotmail.com',
    'copyrightInfo' => 'Copyright Reserved &copy;',
    'dateFormatJS' => 'yy-mm-dd', /* must be the same as the {{dateModelFormat}} but with Y instead of yy (m=>mm , d=>dd) */
    'dateFormatPHP' => 'Y-m-d',
    'dateTimeFormatJS' => 'yy-mm-dd h:i:s',
    'dateTimeFormatPHP' => 'Y-m-d H:i:s',
    'projectUrl' => 'http://localhost/alumni',
    /* these user type ids must match the ids in the user_type table */
    'SuperAdmin' => 1,
    'Admin' => 2,
    'Normal' => 3,
    'currency' => 'SAR',
    'GoingStatus' => 2,
    'InterestedStatus' => 1,
	'allowAutoDelete' => false,
	'myWebsite' => 'http://freepout.com'
);
