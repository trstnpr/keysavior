<?php

	function bbb_init() {

    	$data = array(

    		'endpoint' => 'https://api.bbb.org',

    		'token_path' => '/token',
    		'grant_type' => 'password',
    		'username' => 'stevendaleohtylerr@gmail.com',
    		'password' => 'Green5@123',

    		'search_path' => '/api/orgs/search'

    	);

 		return $data;

	}

	function bearer_token() {

    	$bbb = bbb_init();
        $endpoint = $bbb['endpoint'].$bbb['token_path'];

    	$request_body = 'grant_type='.$bbb['grant_type'].'&username='.$bbb['username'].'&password='.$bbb['password'];

        try {
            $curl = curl_init();
            if (FALSE === $curl)
                throw new Exception('Failed to initialize');

            curl_setopt_array($curl, array(
                CURLOPT_URL => $endpoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 50,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $request_body,
                CURLOPT_HTTPHEADER => array(
                    'cache-control: no-cache',
                    'content-type: application/x-www-form-urlencoded',
                ),
            ));

            $result = curl_exec($curl);

            if (FALSE === $result)
                throw new Exception(curl_error($curl), curl_errno($curl));
            $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (200 != $http_status)
                throw new Exception($result, $http_status);

            curl_close($curl);
        } catch(Exception $e) {

            $result = $e->getMessage();

        }

        $body = json_decode($result);

        if(property_exists($body, 'access_token')) {

        	$response = $body->access_token;

        } else {
        	$response = $body->error;
        }
        
        return $response;
    }

    function request($bearer_token, $endpoint, $path, $params = array()) {
        try {
            $curl = curl_init();
            if (FALSE === $curl)
                throw new Exception('Failed to initialize');

            $url = $endpoint . $path . '?' . http_build_query($params);
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    'authorization: Bearer ' . $bearer_token,
                    'cache-control: no-cache',
                ),
            ));

            $response = curl_exec($curl);

            if (FALSE === $response)
                throw new Exception(curl_error($curl), curl_errno($curl));
            $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (200 != $http_status)
                throw new Exception($response, $http_status);

            curl_close($curl);
        } catch(Exception $e) {
            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        }

        return $response;
    }

    function search($data) {

    	$bbb = bbb_init();
    	$bearer_token = bearer_token();
   		
   		// $data['organizationName'] = 'Locksmith';
   		// $data['PrimaryCategory'] = 'Locks & Locksmiths';
        $data['PrimaryCategory'] = 'Locksmith';
        $data['pageSize'] = 10;

        $req = request($bearer_token, $bbb['endpoint'], $bbb['search_path'], $data);

        $biz = json_decode($req);

        return $biz;
    }

?>