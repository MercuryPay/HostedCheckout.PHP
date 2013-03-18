Mercury Hosted Checkout Sample PHP Integration
==============================================

MercuryHCClient class (contained in MercuryHCClient.php) is used to send requests to Mercury's Hosted Checkout API.

SampleIntegration.php provides a few short examples of how to use a MercuryHCClient object to send requests and how to get the response data. The SampleIntegration.php page also (when viewed in a browser) prints the raw request and response data.

All types exposed by the HostedCheckoutAPI are returned by MercuryHCClient->getTypes();

The appropriate endpoint WSDL URL must be specified in the constructor of MercuryHCClient.

MercuryHCClient uses [PHP's SoapClient](http://php.net/manual/en/class.soapclient.php) which requires PHP 5+ and the libxml PHP extension. This means that passing in --enable-libxml is also required, although this is implicitly accomplished because libxml is enabled by default.
