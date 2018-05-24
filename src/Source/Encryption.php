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
		$this->cipher = "aes-256-ctr";
	}

	public function encrypt($text)
	{
		$ivlen = openssl_cipher_iv_length($this->cipher);
		return openssl_encrypt($text, $this->cipher, $this->key, 0, $this->iv);
	}

	public function decrypt($text)
	{
		$ivlen = openssl_cipher_iv_length($this->cipher);
		return openssl_decrypt($text, $this->cipher, $this->key, 0, $this->iv);
	}
}

?>