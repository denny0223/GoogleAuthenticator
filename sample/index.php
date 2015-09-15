<?php

include_once __DIR__.'/../lib/FixedBitNotation.php';
include_once __DIR__.'/../lib/GoogleAuthenticator.php';

$g = new \Google\Authenticator\GoogleAuthenticator();

$secret = empty($_GET['key']) ? $g->generateSecret() : $_GET['key'];
$time = floor(time() / 30);
$code = '551504';

print 'Current Code is: ';
print $g->getCode($secret);

print "<br />";

print "Check if $code is valid: ";

if ($g->checkCode($secret, $code)) {
    print "YES <br />";
} else {
    print "NO <br />";
}

print "Get a new Secret: $secret <br />";
print "The QR Code for this secret (to scan with the Google Authenticator App: <br />";

print "<img src=\"";
print $g->getURL('denny', 'otp.ddmay.com', $secret);
print "\">";
print "<br />";
