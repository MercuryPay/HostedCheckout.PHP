Mercury Hosted Checkout Sample PHP Integration
==============================================

* Code tested on MacBook PRO running Apache/2.2.26 and PHP/5.4.30
* This sample code is not a full integration to Hosted Checkout.  It does provide sample calls to InitializePayment and VerifyPayment that will be a portion of the full integration.
* Because no card data is actually entered the call to VerifyPayment will not return all of the information after real data is entered in the HostedCheckout card input form.
* You will need to replace the [Merchant ID] and [Password] placeholders in SampleIntegration.php with real values found in the integration guide prior to making the call or you will receive 'Authenticate Failed'.

## SampleIntegration.php

SampleIntegration.php provides a few short examples of how to use a MercuryHCClient object to send requests and how to get the response data. The SampleIntegration.php page also (when viewed in a browser) prints the raw request and response data.

All types exposed by the HostedCheckoutAPI are returned by MercuryHCClient->getTypes();

The appropriate endpoint WSDL URL must be specified in the constructor of MercuryHCClient.

## MercuryHCClient Class

MercuryHCClient class (contained in MercuryHCClient.php) is used to send requests to Mercury's Hosted Checkout API.

MercuryHCClient
 - [getTypes()](https://hc.mercurydev.net/hcws/HCService.asmx?WSDL)
 - [sendInitializeCardInfo($initializeCardInfo)](https://hc.mercurydev.net/hcws/HCService.asmx?op=InitializeCardInfo)
 - [sendInitializePayment($initializePayment)](https://hc.mercurydev.net/hcws/HCService.asmx?op=InitializePayment)
 - [sendVerifyCardInfo($verifyCardInfo)](https://hc.mercurydev.net/hcws/HCService.asmx?op=VerifyCardInfo)
 - [sendVerifyPayment($verifyPayment)](https://hc.mercurydev.net/hcws/HCService.asmx?op=VerifyPayment)

Each method takes an associative array of request parameters, as demonstrated in SampleIntegration.php.

MercuryHCClient uses [PHP's SoapClient](http://php.net/manual/en/class.soapclient.php) which requires PHP 5+ and the libxml PHP extension. This means that passing in --enable-libxml is also required, although this is implicitly accomplished because libxml is enabled by default.

####©2013 Mercury Payment Systems, LLC - all rights reserved.

Disclaimer:
This software and all specifications and documentation contained herein or provided to you hereunder (the "Software") are provided free of charge strictly on an "AS IS" basis. No representations or warranties are expressed or implied, including, but not limited to, warranties of suitability, quality, merchantability, or fitness for a particular purpose (irrespective of any course of dealing, custom or usage of trade), and all such warranties are expressly and specifically disclaimed. Mercury Payment Systems shall have no liability or responsibility to you nor any other person or entity with respect to any liability, loss, or damage, including lost profits whether foreseeable or not, or other obligation for any cause whatsoever, caused or alleged to be caused directly or indirectly by the Software. Use of the Software signifies agreement with this disclaimer notice.

![Analytics](https://ga-beacon.appspot.com/UA-60858025-28/HostedCheckout.PHP/readme?pixel)
