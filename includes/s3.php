<?php 
include_once 'inc.php';

include_once 's3/vendor/autoload.php'; 

use Aws\S3\S3Client;
	
	// Instantiate an Amazon S3 client.
	$s3 = new S3Client([
		'version' => 'latest',
		'region' => $s3Region,
		'credentials' => [
			'key' => $s3Key,
			'secret' => $s3SecretKey,
		],
    ]);  