<?php
	include("config.php");
	include("connect_class.php");
	include('Pusher.php');
	
	//GCM
	// https://code.google.com/apis/console/
	$apiKey = "AIzaSyDYGCnEfEesGJgM-5C7oGnpgGhUB7CH1E4";
	$pusher = new Pusher($apiKey);
	//GCM
	
	
	$message = 'Hi Burak, Congrats!';
	
	$db= new database();
	$qry ="SELECT *  FROM ".TABLE_PREFIX."reg_device";
	$res=$db->query($qry);
	$row=$db->fetch_rows($res);
	foreach($row as $val){
	
	if(strtolower($val['deviceType'])=='android'){
	
		$pusher->notify($val['regId'], $message );
		
		echo "OS : ".$val['deviceType'];
		echo "<br>";
		echo "Device's Reg ID : -".$val['regId'];
		echo "<br>";
		echo "Return Data : - ";
		print_r($pusher->getOutputAsArray());
		echo "<br><br>";
		
	}
	
	
	
	
	
	//For IOS
	
	if(strtolower($val['deviceType'])=='ios'){
	
			echo "OS : ".$val['deviceType'];
			echo "<br>";
			echo "Device's Reg ID : -".$val['regId'];
			echo "<br>";
			// Put your device token here (without spaces):
			$deviceToken = $val['regId']; //'c088c63769d9d977853d5453da61f24e73526cf6811ca1b31ccd646ab84565f9';

			// Put your private key's passphrase here:
			$passphrase = 'pushchat';

			// Put your alert message here:
			

			////////////////////////////////////////////////////////////////////////////////
	
			$ctx = stream_context_create();
			stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns-dev.pem');
			stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

			// Open a connection to the APNS server
			$fp = stream_socket_client(
				'ssl://gateway.sandbox.push.apple.com:2195', $err,
				$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

			if (!$fp)
				exit("Failed to connect: $err $errstr" . PHP_EOL);

			echo 'Connected to APNS' . PHP_EOL;

			// Create the payload body
			$body['aps'] = array(
				'alert' => $message,
				'sound' => 'default'
				);

			// Encode the payload as JSON
			$payload = json_encode($body);

			// Build the binary notification
			$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

			// Send it to the server
			$result = fwrite($fp, $msg, strlen($msg));

			if (!$result)
				echo 'Message not delivered' . PHP_EOL;
			else
				echo 'Message successfully delivered' . PHP_EOL;

			// Close the connection to the server
			fclose($fp);
			
			echo "<br><br>";
	}
	
	
}	