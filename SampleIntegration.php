<?php

/**
 * Mercury Payment Systems Hosted Checkout PHP Client
 *
 * Copyright 2014 Mercury Payment Systems, LLC - all rights reserved.
 *
 * Disclaimer:
 * This software and all specifications and documentation contained
 * herein or provided to you hereunder (the "Software") are provided
 * free of charge strictly on an "AS IS" basis. No representations or
 * warranties are expressed or implied, including, but not limited to,
 * warranties of suitability, quality, merchantability, or fitness for a
 * particular purpose (irrespective of any course of dealing, custom or
 * usage of trade), and all such warranties are expressly and
 * specifically disclaimed. Mercury Payment Systems shall have no
 * liability or responsibility to you nor any other person or entity
 * with respect to any liability, loss, or damage, including lost
 * profits whether foreseeable or not, or other obligation for any cause
 * whatsoever, caused or alleged to be caused directly or indirectly by
 * the Software. Use of the Software signifies agreement with this
 * disclaimer notice.
 */

	// Get MercuryHCClient Object
	include_once("MercuryHCClient.php");
	$hc = new MercuryHCClient();
	
	/**
	 InitializePayment Example
	 */
	function initPaymentExample($hcws)
	{
		$initPaymentRequest = array(
				"MerchantID"	=>	"[Merchant ID]",
				"LaneID"	=> 	"02",
				"Password"	=>	"[Password]",
				"Invoice"	=>	"54321",
				"TotalAmount"	=>	9.9,
				"TaxAmount"	=>	0.0,
				"TranType"	=>	"PreAuth",
				"Frequency"	=>	"OneTime",
				"Memo"	=>	"InitializePaymentTest",
				"ProcessCompleteUrl"	=>	"http://www.mercurypay.com",
				"ReturnUrl"	=>	"http://www.mercurypay.com"
				); 
		
		$initPaymentResponse = $hcws->sendInitializePayment($initPaymentRequest);
		echo "<pre>";
		echo "<h1>InitializePayment Example</h1>";
		echo "Response Code: " . $initPaymentResponse->InitializePaymentResult->ResponseCode;
		echo "<br />Message: " . $initPaymentResponse->InitializePaymentResult->Message;
		echo "<br /><h3>Request:</h3>";
		
		// Hide Password from public echo
		$initPaymentRequest["Password"] = "********";
		
		print_r($initPaymentRequest);
		echo "<br /><h3>Response:</h3>";
		
		$ret = $initPaymentResponse->InitializePaymentResult->PaymentID;
		
		// Hide PaymentID from public echo
		$initPaymentResponse->InitializePaymentResult->PaymentID = "********";
		
		print_r($initPaymentResponse);
		echo "</pre>";
		
		return $ret;
		
	}
	
	/**
	 VerifyPayment Example
	 */
	function verifyPaymentExample($hcws, $pmntID)
	{
		$verifyPaymentRequest = array(
				"MerchantID"	=>	"[Merchant ID]",
				"Password"	=>	"[Password]",
				"PaymentID"	=>	$pmntID
		);
	
		$verifyPaymentResponse = $hcws->sendVerifyPayment($verifyPaymentRequest);
		echo "<pre>";
		echo "<h1>VerifyPayment Example</h1>";
		echo "Response Code: " . $verifyPaymentResponse->VerifyPaymentResult->ResponseCode;
		echo "<br /><h3>Request:</h3>";
		
		// Hide Password and PaymentID from public echo
		$verifyPaymentRequest["Password"] = "********";
		$verifyPaymentRequest["PaymentID"] = "********";
		
		print_r($verifyPaymentRequest);
		echo "<br /><h3>Response:</h3>";
		
		// Hide PaymentID from public echo
		$verifyPaymentResponse->VerifyPaymentResult->PaymentID = "********";
		
		print_r($verifyPaymentResponse);
		
		echo "</pre>";
	}
	
	/**
	 InitializeCardInfo Example
	 */
	function initCardInfoExample($hcws)
	{
		$initCardInfoRequest = array(
				"MerchantID"	=>	"[Merchant ID]",
				"Password"	=>	"[Password]",
				"Frequency"	=>	"OneTime",
				"ProcessCompleteUrl" => "http://www.mercurypay.com",
				"ReturnUrl" => "http://www.mercurypay.com",
		);
	
		$initCardInfoResponse = $hcws->sendInitializeCardInfo($initCardInfoRequest);
		echo "<pre>";
		echo "<h1>InitializeCardInfo Example</h1>";
		echo "Response Code: " . $initCardInfoResponse->InitializeCardInfoResult->ResponseCode;
		echo "<br />Message: " . $initCardInfoResponse->InitializeCardInfoResult->Message;
		echo "<br /><h3>Request:</h3>";
		
		// Hide Password from public echo
		$initCardInfoRequest["Password"] = "********";
		
		print_r($initCardInfoRequest);
		echo "<br /><h3>Response:</h3>";
		
		$ret = $initCardInfoResponse->InitializeCardInfoResult->CardID;
		
		// Hide PaymentID from public echo
		$initCardInfoResponse->InitializeCardInfoResult->CardID = "********";
		
		print_r($initCardInfoResponse);
		echo "</pre>";
		
		return $ret;
	}
	
	/**
	 VerifyCardInfo Example
	 */
	function verifyCardInfoExample($hcws, $cID)
	{
		$verifyCardInfoRequest = array(
				"MerchantID"	=>	"[Merchant ID]",
				"Password"	=>	"[Password]",
				"PaymentID"	=>	"CardID" =>$cID;
		);
	
		$verifyCardInfoResponse = $hcws->sendVerifyCardInfo($verifyCardInfoRequest);
		echo "<pre>";
		echo "<h1>VerifyCardInfo Example</h1>";
		echo "Response Code: " . $verifyCardInfoResponse->VerifyCardInfoResult->ResponseCode;
		echo "<br /><h3>Request:</h3>";
	
		// Hide Password and CardID from public echo
		$verifyCardInfoRequest["Password"] = "********";
		$verifyCardInfoRequest["CardID"] = "********";

		print_r($verifyCardInfoRequest);
		echo "<br /><h3>Response:</h3>";
	
		// Hide CardID and PaymentID from public echo
		$verifyCardInfoResponse->VerifyCardInfoResult->CardID = "********";

		print_r($verifyCardInfoResponse);
	
		echo "</pre>";
	}

	// Print out all 4 examples
	$paymentID = initPaymentExample($hc);
	verifyPaymentExample($hc, $paymentID);
	$cardID = initCardInfoExample($hc);
	verifyCardInfoExample($hc, $cardID);
	
	// Print out SOAP type information
	echo "<pre>";
	echo "<h1>Hosted Checkout SOAP Types</h1>";
	print_r($hc->getTypes());
	echo "</pre>";
	
?>
