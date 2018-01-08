<?php

namespace App\Controller\Member;

use App\Controller\Member\AppMemberController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;


class TicketMessagesController extends AppMemberController
{
    public function index()
    {
        
        $ticketMessagesTable = TableRegistry::get('TicketMessages');
        $ticket_messages = $ticketMessagesTable->newEntity();

        if ($this->request->is('post')) 
        {
            $ticket_messages = $ticketMessagesTable->patchEntity($ticket_messages,$this->request->data, [
                'associated' => ['Tickets']
            ]);

            if ($ticketMessagesTable->save($ticket_messages))
            {
                $id = $ticket_messages->ticketId;
                $this->Flash->success(__($id.'Destek talebin başarıyla oluşturuldu.'));
                return $this->redirect(['action' => 'index']);
            }
        }
        

        $this->set('ticketMessages', $ticket_messages);
        
            
        
    }
     
}
