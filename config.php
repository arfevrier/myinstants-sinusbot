<?php /*----- CONFIG FILE -----*/


		/*FOR WEBINTERFACE*/
			
			
			$link_to_sinusbot_panel = "public/link.html"; /*(For iframe, in dual screen page [?page=iframe]
															 Default = "public/link.html"; Example: "https://localhost:8087" )*/

		
		/*FOR SINUSBOT API (Controle bot)*/

			$sinusbot_ip = "127.0.0.1";
			$sinusbot_port = "8087";
			$sinusbot_ssl_activated = false; /* Default you use "http://", if you use "httpS://" set =true */
			
			$webinterface_use_login_page = true; /*Webinterface request login of sinusbot*/
				$sinusbot_login = "Not read if =true";			
				$sinusbot_password = "Not read if =true";	/*If $webinterface_use_login_page=true, $sinusbot_login and $sinusbot_password will not read.*/
			
			$sinusbot_instances_uuid = ""; /* If you do not know, put nothing. If you have 2+ bot, the first will be selected. 
												Find ID in http://127.0.0.1:8087/settings/general at the end of the page*/


/*----- CONFIG FILE -----*/ ?>