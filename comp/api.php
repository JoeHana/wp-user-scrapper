<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$filename = '';

if(isset($_REQUEST['location']))
{
    $location = @json_decode($_REQUEST['location'], true);
    if(!empty($location))
    {
        if(isset($location['host']))
        {
            $filename .= str_replace('.', '-', $location['host']);
        }
        if(isset($location['pathname']))
        {
            $path = $location['pathname'];
            $path = str_replace('/wp-admin/users.php', '', $path);
            $path = str_replace('/', '-', $path);
			
			if(!(strlen($path) == 1 && $path[0] == '-'))
				$filename .= $path;
				
        }
            
    }
}

if(empty($filename))
{
    $filename = isset($_REQUEST['filename']) ? basename($_REQUEST['filename']) : 'users';
}

$filename .= '.' . time();

$filename .= '.json';

$file = dirname(dirname(__FILE__)) . '/data/' . $filename;

if(isset($_REQUEST['users']))
{
    $users = $_REQUEST['users'];

    file_put_contents($file, $users);

    echo json_encode(array('success' => true));
}
else
{
    echo json_encode(array('success' => false));
}