<?php

namespace App\Libs;

class pay
{
   public static function send($api, $amount, $redirect, $mobile = null, $factorNumber = null, $description = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://pay.ir/payment/send");
	curl_setopt($ch, CURLOPT_POSTFIELDS, "api=$api&amount=$amount&redirect=$redirect");
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type: application/json',
	]);
	$res = curl_exec($ch);
	curl_close($ch);

	return $res;
}

public function verify($api, $token) {
	return curl_post('https://pay.ir/pg/verify', [
		'api' 	=> $api,
		'token' => $token,
	]);
}



}