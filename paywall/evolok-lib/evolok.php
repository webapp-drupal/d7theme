<?php
/*** Evolok Integration Library ***/

// namespace Evolok;


class Evolok
{    
	private static function ev_call( $url, $header, $req_data, $req_type ){
		$ch =curl_init();

		// var_dump($header);
		// var_dump($req_data);

		if( $req_type == "POST" ){
			curl_setopt($ch, CURLOPT_POST, 1);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_data); 
		}elseif( $req_type == "DELETE" ){
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
			$data = http_build_query($req_data);
			$url = $url . '?' . $data;
		}elseif( $req_type == "GET" ){
			$data = http_build_query($req_data);
			$url = $url . '?' . $data;
			// var_dump($url);
		}else{
			curl_setopt($ch, CURLOPT_POST, 1);
			$data = http_build_query($req_data);
			$url = $url . '?' . $data;
			// echo 'special: '; var_dump($url);
			
		}
		// var_dump($req_data);


		// if( isset($_SESSION["ev_sid"]) ){
		// 	$ev_sid = $_SESSION["ev_sid"];
		// }
		// if( isset($_SESSION["ev_did"]) ){
		// 	$ev_did = $_SESSION["ev_did"];
		// }


		// curl_setopt($ch, CURLOPT_COOKIE, "ev_sid=$ev_did;ev_did=$ev_did");

		// curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_URL, $url);

	    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

	    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	    // curl_setopt($curl1, CURLOPT_FRESH_CONNECT, TRUE);
	    curl_setopt($ch, CURLOPT_VERBOSE, true);
	    

	    $result = curl_exec($ch);
	    $info = curl_getinfo($ch);
	    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    // echo 'here: ';
	   	// echo '<pre>' . print_r($info['request_header'], true) . '</pre>';
	   	// echo '!!ends!! ';
	    

	    return $result;
	}

	// private static function ev_delete_request( $url, $session_id , $data ){
	// 	$ch = curl_init();

	// 	$data = http_build_query($data);
	// 	$url = $url . $session_id . '?' . $data;
	// 	var_dump($url);

	// 	$header_content = array(
	// 	      "Accept: application/json",
	// 	      "Authorization: Evolok evolok.api.service=default"
	// 	    );

	// 	curl_setopt($ch, CURLOPT_URL, $url);
	// 	curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	//     curl_setopt($ch, CURLOPT_HTTPHEADER, $header_content);

	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	// 	$result = curl_exec($ch);
	//     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	//     curl_close($ch);

	//     return $result;

	// }

	private static function ev_set_cookie($name, $value=''){
		$val = md5(uniqid(rand(), true));
		if($value){
				$val = $value;
			}
		if(!isset($_COOKIE["$name"])) {
		    echo "Cookie named '" . $name . "' is not set!";
		    var_dump( setcookie("$name", $val, time() + (86400 * 30), "/") ); // 86400 = 1 day
		    var_dump( $_COOKIE["$name"] );
		} else {
		    echo "Cookie '" . $name . "' is set!<br>";
		    echo "Value is: " . $_COOKIE["$name"];
		}

		if( !isset($_SESSION[$name]) ){
			$_SESSION["ev_ss"] = $val;
		}else{
			echo "$name " . 'sess not set';
		}
	}

	private static function ev_delete_cookie($name){
		if( isset($_COOKIE["$name"]) ) {
			unset($_COOKIE["$name"] );
		    echo "Cookie named '" . $name . "' is deleted!";
		} else {
		    echo "Cookie '" . $name . "' was not set!!!!!<br>";
		}
		if( isset($_SESSION["ev_user"]) ){
			unset( $_SESSION["ev_user"] );
		}
		if( isset($_SESSION["ev_ss"]) ){
			unset( $_SESSION["ev_ss"] );
		}
	}

	private static function get_request_header( $func_requester, $len ){
		$header_content = array();
		if( $func_requester == "ev_create_session" ){

			$header_content = array(
		      "Content-Type: application/json",
		      "Accept: application/json",
		      "Authorization: Evolok evolok.api.service=default",
		      "Content-Length: " . $len
		    );
		}
	    return $header_content;
	}

	private static function get_req_data( $data ){
		$data_string = 0;
		$func_caller = debug_backtrace()[1]['function'];

		if( $func_caller == "ev_create_session" ){
			$data_string = '{
		        "realmName": "default_realm",
		        "authenticationSchemeName": "default",
		        "rememberMe": false,
		        "identifiers": [
		          {
		            "name": "email_address",
		            "value": "'. $data["email"] .'"
		          }
		        ],
		        "validators": [
		          {
		            "name": "password",
		            "value": "'. $data["password"] .'"
		          }
		        ]
		      }';
		}

	     return $data_string;
	}

	public static function ev_logout(){
		if( isset( $_SESSION["ev_user"] ) ){
			$data = array(
						"serviceName"	=> "default",
						"realmName"		=> "default_realm"
					);
			$session_id = $_SESSION["ev_user"]->mainSession->sessionId;

			$header = array(
		      "Accept: application/json",
		      "Authorization: Evolok evolok.api.service=default evolok.api.sessionId=" . $session_id
		    );

			$session = self::ev_call( "https://cmp.uat.evolok.net/evolok-idm-web/api/session/" . $session_id, $header, $data, "DELETE" );
			self::ev_delete_cookie('ev_user');
			return $session;
		}
		return false;
	}

	public static function ev_login( $login_credentials ){
		$login = self::ev_create_session($login_credentials);
		$_SESSION["ev_user"] = $login;
		return $login;
	}

	public static function ev_authorize( $data ){
		// $authorize = self::ev_call( "https://cmp.uat.evolok.net/acd/api/3.0/authorize/json", $data, true );
		$cook_sess = (isset( $_COOKIE['ev_ss'] ) ? $_COOKIE['ev_ss'] : (isset( $_SESSION['ev_ss']) ? $_SESSION['ev_ss'] : '' ) );
		$cook_sess_sid = (isset( $_COOKIE['ev_sid'] ) ? $_COOKIE['ev_sid'] : (isset( $_SESSION['ev_sid']) ? $_SESSION['ev_sid'] : '' ) );
		$cook_sess_did = (isset( $_COOKIE['ev_did'] ) ? $_COOKIE['ev_did'] : (isset( $_SESSION['ev_did']) ? $_SESSION['ev_did'] : '' ) );
	  	$header = array(
	  			"Cookie: ev_sid=$cook_sess_sid; ev_did=$cook_sess_did"
		    );

	  	if( $cook_sess ){
	  		$data['ev_ss'] = $cook_sess;
	  	}
	  	// var_dump($header);
		$authorize = self::ev_call( "https://cmp.uat.evolok.net/acd/api/3.0/authorize/json", $header, $data, "GET" );
		$res = json_decode($authorize);
		// var_dump($res);
		if( !isset($_SESSION["ev_sid"]) ){
			setcookie("ev_sid", $res->sessionKeys->ev_sid, time() + (86400 * 30), "/");
			$_SESSION["ev_sid"] = $res->sessionKeys->ev_sid;
			echo 'ev_sid set';
		}
		if( !isset($_SESSION["ev_did"]) ){
			setcookie("ev_did", $res->sessionKeys->ev_did, time() + (86400 * 30), "/");
			$_SESSION["ev_did"] = $res->sessionKeys->ev_did;
			echo 'ev_did set';
		}

		return $authorize;
	}

	private static function ev_create_session( $data ){
		$req_data = self::get_req_data( $data );
		$header = array(
		      "Content-Type: application/json",
		      "Accept: application/json",
		      "Authorization: Evolok evolok.api.service=default",
		      "Content-Length: " . strlen($req_data)
		    );
	  // $session = self::ev_call( "https://cmp.uat.evolok.net/evolok-idm-web/api/session", $data );
		$session = self::ev_call( "https://cmp.uat.evolok.net/evolok-idm-web/api/session", $header, $req_data, "POST" );
	  	self::ev_set_cookie('ev_ss');
	  	return json_decode($session);
	}

	public static function ev_get_user_profile(){
		if( isset( $_SESSION["ev_user"] ) ){
			$guid = $_SESSION["ev_user"]->guid;
			$session_id = $_SESSION["ev_user"]->mainSession->sessionId;
			$data = array(
						"serviceName"	=> "default",
					);
			$header = array(
					      "Content-Type: application/json",
					      "Accept: application/json",
					      "Authorization: Evolok evolok.api.service=default  evolok.api.sessionId=" . $session_id
					    );

			

		  $user = self::ev_call( "https://cmp.uat.evolok.net/evolok-idm-web/api/userProfile/" . $guid, $header, $data, "GET" );
		  return json_decode($user);
		}
	}

	public static function ev_amp_authorize( $data ){
		$cook_sess = 	 (isset( $_COOKIE['ev_ss'] ) ? $_COOKIE['ev_ss'] : (isset( $_SESSION['ev_ss']) ? $_SESSION['ev_ss'] : '' ) );
		$cook_sess_sid = (isset( $_COOKIE['ev_sid'] ) ? $_COOKIE['ev_sid'] : (isset( $_SESSION['ev_sid']) ? $_SESSION['ev_sid'] : '' ) );
		$cook_sess_did = (isset( $_COOKIE['ev_did'] ) ? $_COOKIE['ev_did'] : (isset( $_SESSION['ev_did']) ? $_SESSION['ev_did'] : '' ) );
		$header = array();
		if( !empty($cook_sess_sid) && !empty($cook_sess_did) ){
			$header = array(
	  			"Cookie: ev_sid=$cook_sess_sid; ev_did=$cook_sess_did"
		    );
		}
	  	// echo '<pre>' . print_r($_COOKIE, true) . '</pre>';
	  	if( !empty($cook_sess) ){
	  		$data['ev_ss'] = $cook_sess;
	  	}
	  	// var_dump($data);
		$authorize = self::ev_call( "https://cmp.uat.evolok.net/acd/api/3.0/authorize/amp", $header, $data, "GET" );
		$res = json_decode($authorize);
		// echo '<pre>' . print_r($res, true) . '</pre>';
		// self::ev_set_cookie('ev_sid', $res->sessionKeys->ev_sid);
		// self::ev_set_cookie('ev_did', $res->sessionKeys->ev_did);

		// var_dump( $_SESSION["ev_sid"] );
		// var_dump( $_SESSION["ev_did"] );

		if( !isset($_SESSION["ev_sid"]) && empty($_SESSION["ev_sid"]) ){
			setcookie("ev_sid", $res->sessionKeys->ev_sid, time() + (86400 * 30), "/");
			$_SESSION["ev_sid"] = $res->sessionKeys->ev_sid;
			// echo 'ev_sid set';
		}
		if( !isset($_SESSION["ev_did"]) && empty($_SESSION["ev_did"]) ){
			setcookie("ev_did", $res->sessionKeys->ev_did, time() + (86400 * 30), "/");
			$_SESSION["ev_did"] = $res->sessionKeys->ev_did;
			// echo 'ev_did set';
		}
		
		return $res;
	}

	public static function ev_amp_pingback( $data ){
		$cook_sess_sid = (isset( $_COOKIE['ev_sid'] ) ? $_COOKIE['ev_sid'] : (isset( $_SESSION['ev_sid']) ? $_SESSION['ev_sid'] : '' ) );
		$cook_sess_did = (isset( $_COOKIE['ev_did'] ) ? $_COOKIE['ev_did'] : (isset( $_SESSION['ev_did']) ? $_SESSION['ev_did'] : '' ) );
	  	$header = array(
	  			"Cookie: ev_sid=$cook_sess_sid; ev_did=$cook_sess_did"
		    );
		$authorize = self::ev_call( "https://cmp.uat.evolok.net/acd/api/3.0/authorize/amp/pingback", $header, $data, "SPOST" );
		return $authorize;
	}

	public static function ev_redirect_subscribe_page(){

	}
}

function sayHello(){
	echo "hello bros!!!!";
}


?>