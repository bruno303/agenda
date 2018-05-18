<?php

namespace Source;

Class Encryption
{
	private $key;
	private $cipher;
	private $iv;

	public function __construct()
	{
		$this->key = base64_encode("agenda");
		$this->iv = "aIUh1dhsj9ASDKJH";
		$this->cipher = openssl_get_cipher_methods()[117];
	}

	public function encrypt($text)
	{
		$ivlen = openssl_cipher_iv_length($this->cipher);
		// $this->iv = openssl_random_pseudo_bytes($ivlen);
		return openssl_encrypt($text, $this->cipher, $this->key, 0, $this->iv);
	}

	public function decrypt($text)
	{
		$ivlen = openssl_cipher_iv_length($this->cipher);
		$iv = substr(base64_decode($text), 0, $ivlen);
		return openssl_decrypt($text, $this->cipher, $this->key, 0, $this->iv);
	}
}

?>