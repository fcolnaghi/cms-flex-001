<?php
		header("content-type: text/xml");
		$cep = $_GET['cep'];
			
	        // create curl resource
	        $ch = curl_init();
	
	        $url = "http://cep.republicavirtual.com.br/web_cep.php?cep=".$cep."&formato=xml";
	        
	        // set url
	        curl_setopt($ch, CURLOPT_URL, $url);
	
	        //return the transfer as a string
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	        curl_setopt($ch, CURLOPT_PROXY, "http://10.2.8.200");
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, "fcolnaghi:!senha321!"); 
	        
	        // $output contains the output string
	        $output = curl_exec($ch);
	
	        // close curl resource to free up system resources
	        curl_close($ch);
        
		echo $output;
?>