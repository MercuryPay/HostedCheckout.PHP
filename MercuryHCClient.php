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
    protected $wsClient;

    protected $merchantId;

    protected $password;


    public function __construct($merchantId, $password)
    {
        $this->merchantId = $merchantId;
        $this->password = $password;

        // Hosted Checkout API WSDL URL
        $wsdlURL = 'https://hc.mercurycert.net/hcws/HCService.asmx?WSDL';
        $this->wsClient = new SoapClient($wsdlURL);
    }


    public function __call($name, $args)
    {
        $methodsAvaliable = [
            'InitializeCardInfo',
            'InitializePayment',
            'VerifyCardInfo',
            'VerifyPayment',
        ];

        $pre = substr($name, 0, 4);
        $rest = substr($name, 4);
        
        if ($pre == 'send' && in_array($rest, $methodsAvaliable)) {
            $requestData = array_merge(
                [
                    'MerchantID' => $this->merchantId,
                    'Password' => $this->password,
                ],
                $args[0]
            );

            $resp = $this->wsClient->$rest(['request' => $requestData ]);
            
            return $resp->{$rest.'Result'};
        }

        throw new Exception('Error, the method ' . $rest . ' does not exist');
    }


    public function getTypes()
    {
        return $this->wsClient->__getTypes();
    }
}
