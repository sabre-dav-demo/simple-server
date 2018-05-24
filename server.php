<?php

use
    Sabre\DAV;

// The autoloader
require 'vendor/autoload.php';

// Now we're creating a whole bunch of objects
// $rootDirectory = ;

// The server object is responsible for making sense out of the WebDAV protocol
$server = new DAV\Server(new DAV\FS\Directory('public'));

// If your server is not on your webroot, make sure the following line has the
// correct information
$server->setBaseUri('/');

// The lock manager is reponsible for making sure users don't overwrite
// each others changes.
// $lockBackend = ;
// $lockPlugin = ;
$server->addPlugin(new DAV\Locks\Plugin(new DAV\Locks\Backend\File('data/locks')));

// This ensures that we get a pretty index in the browser, but it is
// optional.
$server->addPlugin(new DAV\Browser\Plugin());

// All we need to do now, is to fire up the server
$server->exec();

// from: http://sabre.io/dav/gettingstarted/
