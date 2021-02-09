<?php

namespace App\Helper;

use \GuzzleHttp\Client;


class MailHelper
{
	public static function KirimEmail($nama_pengirim, $from, $to, $subject, $message)
	{
		$client = new Client();
		$client->post(
		    'http://email.dafma.web.id/mail.php',
		    array(
		        'form_params' => array(
		            'from' => $from,
		            'from_name' => $nama_pengirim,
		            'to' => $to,
		            'subject' => $subject,
		            'message' => $message,
		            'key' => "syahroel_78u%^&*YTYUIUHkhan"
		        )
		    )
		);

		// try {
	 //        $headers = "From: $nama_pengirim <$from>" . "\r\n";
	 //        $headers .='Reply-To: '. $to . "\r\n" ;
	 //        $headers .='X-Mailer: PHP/' . phpversion();
	 //        $headers .= "MIME-Version: 1.0\r\n";
	 //        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";   
	        
	 //        $hasil = ["terkirim" => true];

	 //        mail($to,$subject,$message, $headers);   
	 //    } catch (Exception $e) {
	 //      $hasil = array("terkirim" => false);
	 //      $hasil["error"] = $e->getMessage();
	 //    } finally {
	 //        return $hasil;   
	 //    }
	}
}
