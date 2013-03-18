<?php

/**
 * Mercury Payment Systems HostedCheckout PHP Client
 *
 * ©2013 Mercury Payment Systems, LLC - all rights reserved.
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

	class MercuryHCClient
	{		
		
		private $wsClient;
		
		function __construct()
		{
			// Hosted Checkout API WSDL URL
			$wsdlURL = "https://hc.mercurydev.net/hcws/HCService.asmx?WSDL";
			$this->wsClient = new SoapClient($wsdlURL);
		}
				
		public function getTypes()
		{
			return $this->wsClient->__getTypes();
		}
		
		public function sendInitializeCardInfo($initializeCardInfo)
		{
			$initCardInfoRequest = array("request" => $initializeCardInfo);
			return $this->wsClient->InitializeCardInfo($initCardInfoRequest);
		}
		
		public function sendInitializePayment($initializePayment)
		{
			$initPaymentRequest = array("request" => $initializePayment);
			return $this->wsClient->InitializePayment($initPaymentRequest);
		}
		
		public function sendVerifyCardInfo($verifyCardInfo)
		{
			$verifyCardInfoRequest = array("request" => $verifyCardInfo);
			return $this->wsClient->VerifyCardInfo($verifyCardInfoRequest);
		}
		
		public function sendVerifyPayment($verifyPayment)
		{
			$verifyPaymentRequest = array("request" => $verifyPayment);
			return $this->wsClient->VerifyPayment($verifyPaymentRequest);
		}
		
	}

?>