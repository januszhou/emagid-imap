<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 3/20/17
 * Time: 4:40 PM
 */
namespace EmagidService;

use PhpImap\Mailbox as ImapMailbox;

class MailBox
{
    private $inbox;
    
    public function __construct($server, $account, $password)
    {
        $this->inbox = new ImapMailbox('{'.$server.':993/imap/ssl}INBOX', $account, $password);
    }

    public function getMailBySender($sender)
    {
        $mailsIds = $this->inbox->searchMailbox('FROM '.$sender);
        return $this->getData($mailsIds);
    }

    private function getData($ids)
    {
        $inbox = $this->inbox;
        return array_map(function($id) use ($inbox) {
            return $inbox->getMail($id);
        }, $ids);
    }
}