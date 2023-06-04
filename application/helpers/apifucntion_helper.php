<?php		
	if ( ! function_exists('CallAPI')) //PAKAI INI AJA UNTUK REST
	{		
		function CallAPI($method, $url, $data) {
			$st = array();
			$st['status'] = true;
			
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, get_token());
			switch ($method) {
				case "GET":
					curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
					break;
				case "POST":
					curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
					break;
				case "PUT":
					curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
					break;
				case "DELETE":
					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 
					curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
					break;
			}
			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
			if ($err) {
				$st['status'] = false;
				$st['respone'] = "Error #:" . $err;
			} else {
				$st['respone'] = $response;
			}
			return $st;
		}
	}
	if (!function_exists('get_data')) {
		function get_data($url)
		{
			$st = array();
			$st['status'] = true;
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, get_token());
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			 
			$response = curl_exec($ch);
			$err = curl_error($ch);

			curl_close($ch);
			if ($err) {
				$st['status'] = false;
				$st['respone'] = "Error #:" . $err;
			} else {
				$st['respone'] = $response;
			}
			return $st;
		}
	}
	if ( ! function_exists('post_kirim'))
	{
		
		function post_kirim($url, $data){
			$data = json_encode($data);
			$st = array();
			$st['status'] = true;
			
			$ch = curl_init($url);
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS,$data);
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt( $ch, CURLOPT_HTTPHEADER, get_token());
			curl_setopt( $ch, CURLOPT_HEADER, 0);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
			$response = curl_exec($ch);
			$err = curl_error($ch);

			curl_close($ch);
			if ($err) {
				$st['status'] = false;
				$st['respone'] = "Error #:" . $err;
			} else {
				$st['respone'] = $response;
			}
			return $st;
		}
	}
	function get_token()
	{
		$key = '23376c83cbcf73db9c4a7617807a4b5f';
		$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.e30.6UeJp52ITYbGsfOCWrzUkfyNU2tbmeu6wpKaFqlRlY0';
		$token_key = array('content-type: application/json', 'authorization:' . $token);
		return $token_key;
	}

	function get_key()
	{
		$key = '23376c83cbcf73db9c4a7617807a4b5f';
		return $key;
	}
