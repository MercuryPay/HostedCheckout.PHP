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
include_once('MercuryHCClient.php');
$hc = new MercuryHCClient('[Merchant ID]', '[Password] ');

/**
InitializePayment Example
*/
function initPaymentExample($hcws)
{
    $initPaymentRequest = [
        'LaneID' => '02',
        'Invoice' => '54321',
        'TotalAmount'=> 9.9,
        'TaxAmount' => 0.0,
        'TranType' => 'PreAuth',
        'Frequency' => 'OneTime',
        'Memo' => 'InitializePaymentTest',
        'ProcessCompleteUrl' => 'http://www.mercurypay.com',
        'ReturnUrl' => 'http://www.mercurypay.com'
    ];

    $initPaymentResponse = $hcws->sendInitializePayment($initPaymentRequest);

    echo '<pre>';
    echo '<h1>InitializePayment Example</h1>';
    echo 'Response Code: ' . $initPaymentResponse->ResponseCode;
    echo '<br />Message: ' . $initPaymentResponse->Message;
    echo '<br /><h3>Request:</h3>';

    print_r($initPaymentRequest);
    echo '<br /><h3>Response:</h3>';

    $ret = $initPaymentResponse->PaymentID;

    // Hide PaymentID from public echo
    $initPaymentResponse->PaymentID = '********';

    print_r($initPaymentResponse);
    echo '</pre>';
    return $ret;
}

/**
VerifyPayment Example
*/
function verifyPaymentExample($hcws, $pmntID)
{
    $verifyPaymentRequest = [
        'PaymentID' =>  $pmntID
    ];

    $verifyPaymentResponse = $hcws->sendVerifyPayment($verifyPaymentRequest);

    echo '<pre>';
    echo '<h1>VerifyPayment Example</h1>';
    echo 'Response Code: ' . $verifyPaymentResponse->ResponseCode;
    echo '<br /><h3>Request:</h3>';
    
    // Hide PaymentID from public echo
    $verifyPaymentRequest['PaymentID'] = '********';
    
    print_r($verifyPaymentRequest);
    echo '<br /><h3>Response:</h3>';
    
    // Hide PaymentID from public echo
    $verifyPaymentResponse->PaymentID = '********';
    
    print_r($verifyPaymentResponse);
    
    echo '</pre>';
}

/**
InitializeCardInfo Example
*/
function initCardInfoExample($hcws)
{
    $initCardInfoRequest = [
        'Frequency' => 'OneTime',
        'ProcessCompleteUrl' => 'http://www.mercurypay.com',
        'ReturnUrl' => 'http://www.mercurypay.com',
    ];

    $initCardInfoResponse = $hcws->sendInitializeCardInfo($initCardInfoRequest);
    
    echo '<pre>';
    echo '<h1>InitializeCardInfo Example</h1>';
    echo 'Response Code: ' . $initCardInfoResponse->ResponseCode;
    echo '<br />Message: ' . $initCardInfoResponse->Message;
    echo '<br /><h3>Request:</h3>';
    
    print_r($initCardInfoRequest);
    echo '<br /><h3>Response:</h3>';
    
    $ret = $initCardInfoResponse->CardID;
    
    // Hide PaymentID from public echo
    $initCardInfoResponse->CardID = '********';
    
    print_r($initCardInfoResponse);
    echo '</pre>';

    return $ret;
}

/**
VerifyCardInfo Example
*/
function verifyCardInfoExample($hcws, $cID)
{
    $verifyCardInfoRequest = [
        'PaymentID' => $cID
    ];

    $verifyCardInfoResponse = $hcws->sendVerifyCardInfo($verifyCardInfoRequest);
    
    echo '<pre>';
    echo '<h1>VerifyCardInfo Example</h1>';
    echo 'Response Code: ' . $verifyCardInfoResponse->ResponseCode;
    echo '<br /><h3>Request:</h3>';
            
    // Hide CardID from public echo
    $verifyCardInfoRequest['CardID'] = '********';
    print_r($verifyCardInfoRequest);
    echo '<br /><h3>Response:</h3>';
            
    // Hide CardID and PaymentID from public echo
    $verifyCardInfoResponse->CardID = '********';
    print_r($verifyCardInfoResponse);
            
    echo '</pre>';
}
// Print out all 4 examples
$paymentID = initPaymentExample($hc);

verifyPaymentExample($hc, $paymentID);
$cardID = initCardInfoExample($hc);
verifyCardInfoExample($hc, $cardID);

// Print out SOAP type information
echo '<pre>';
echo '<h1>Hosted Checkout SOAP Types</h1>';
print_r($hc->getTypes());
echo '</pre>';
