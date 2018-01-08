<?php

namespace App\Controller\Member;

use App\Controller\Member\AppMemberController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;


class TicketsController extends AppMemberController
{
    public function index()
    {
        
        $ticketsTable = TableRegistry::get('Tickets');
        $tickets = $ticketsTable->newEntity();

        if ($this->request->is('post')) 
        {
            $tickets = $ticketsTable->patchEntity($tickets,$this->request->data, [
                'associated' => ['TicketMessages']
            ]);

            if ($ticketsTable->save($tickets))
            {
                $id = $tickets->id;
                $this->Flash->success(__($id.'Destek talebin başarıyla oluşturuldu.'));
                return $this->redirect(['action' => 'index']);
            }
        }
        

        $this->set('tickets', $tickets);
        
            
        
    }
     
}
