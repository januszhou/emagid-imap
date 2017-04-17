<?php
require('vendor/autoload.php');

$inbox = new EmagidService\MailBox('imap.gmail.com', 'januszhou1@gmail.com', 'zhou1005');
var_dump($inbox->getMailBySender('zhou19911005@gmail.com'));