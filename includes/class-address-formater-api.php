<?php 

class AddressFormaterApi {
		
	private $access_token;
	
	protected $headers = [];

	public function __construct($access_token) {
		
		$this->setAccessToken($access_token);

		$this->headers = [
		'X-User-Authorization' => 'Basic ZGFyeWEua2F6aW1pcnNrYXlhLjIwMDBAZ21haWwuY29tOjk3ODAxMjU=',
        'Authorization' => $this->getAccessToken()
    ];

	}

	public function setAccessToken($access_token) {
		$this->access_token = $access_token;
	}

	public function getAccessToken() {
		return $this->access_token;
	}

	public function addressFormat(string $address) {
		
		$request = wp_remote_post('https://otpravka-api.pochta.ru/1.0/clean/address', 
    		[
    			'headers' => $this->headers
    		]);

		$token = json_decode($request['body']);
	}
}