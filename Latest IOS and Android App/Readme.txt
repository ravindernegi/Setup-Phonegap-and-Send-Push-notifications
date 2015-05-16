
I did put all the code in "Latest IOS and Android App" folder.  

1. All the files of Android
	Note: I have the full code in following location: 
		> 	.\android\full_source_code_android

	
2. Only files of Android that i will use to Build via PhoneGap
	 Note: I have the full code in following location: 
	>  .\android\\build_phonegap

3. PHP Files for Admin Part 

	Note: I have the full code in following location: 
	>  ./php_code_for_admin
	
	
	a) php_code_for_admin\api.php
	
	Note:  we are using  the file for  getting device ids  and store in  the database tables.  it will run by our app. we need to set the url of that file inside the app "www/main_pn.html" please find below code in main_pn.html

			var URL ="http://projects.softweavertech.com/androidpusher-master/";  change with you hosting address.
			
	b) 	php_code_for_admin\push_notification.php
		Note:  The file using for send notification on IOS and Android devices. we will use that code in admin part; 
		
	c) Pusher.php
		Note: the files using for GCM . it is class of send notification . 
	d) reg_device.sql
		Note: please import the table in you database
			
		
			
 

------------------------------------------------------------------------------------------------------------------------------

1. All the files of IOS
Note: I have the full code in following location: 
		> 	.\ios\full_source_code_ios

2. Only files of IOS that i will use to Build via PhoneGap
	 Note: I have the full code in following location: 
	>  .\ios\build_phonegap

3. PHP Files for Admin Part 

	Note: I have the full code in following location: 
	>  ./php_code_for_admin
	
	
	a) php_code_for_admin\api.php
	
	Note:  we are using  the file for  getting device ids  and store in  the database tables.  it will run by our app. we need to set the url of that file inside the app "www/main_pn.html" please find below code in main_pn.html

			var URL ="http://projects.softweavertech.com/androidpusher-master/";  change with you hosting address.
			
	b) 	php_code_for_admin\push_notification.php
		Note:  The file using for send notification on IOS and Android devices. we will use that code in admin part; 
		
	c) Pusher.php
		Note: the files using for GCM . it is class of send notification . 
		
		d) apns-dev.pem
		the files using for APNS . it is certicicate which genrate by Apple Developer Account.
		
	e) reg_device.sql
		Note: please import the table in you database
	
			
		
			
 

