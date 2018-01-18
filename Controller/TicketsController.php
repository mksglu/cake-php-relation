<?php

namespace App\Controller\Member;

use App\Controller\Member\AppMemberController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;


class TicketsController extends AppMemberController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('TicketMessages');
        
    }
    public function index()
    {
       
        $query = $this->Tickets->find('all', [
            'order' => ['created' => 'DESC']
        ])->contain(['TicketMessages'])->where(['user_id' => 3]);
            
        
        
        $invoices = $this->paginate($query);

        $this->set('tickets', $invoices);
  
    }

    public function add() {
        $tickets = $this->Tickets->newEntity();
        if ($this->request->is('post')) 
      {

          $this->request->data['ticket_messages'][0]['head'] = 0;
            
          $ticket_messages = $this->Tickets->newEntity($this->request->data, [
             'associated' => ['TicketMessages']                
          ]);
          $ticket_messages->user_id = 3;
           if ($this->Tickets->save($ticket_messages))
          {
              $id = $tickets->id;
              $this->Flash->success(__($id.'Destek talebin başarıyla oluşturuldu.'));
              //return $this->redirect(['action' => 'index']);
          }
      }
  
      
      $this->set('tickets', $tickets);
    }

    public function view( $id = null)
    {      
        $query = $this->TicketMessages->findByTicketId($id)->contain('Tickets')->where([
            'user_id' => 3 //$this->Auth->user('id')
        ]) ;

        if ((int)!$id || !$query->count()) {
            throw new NotFoundException(__('Geçerli olmayan ID değeri.'));
        }
        $tickets = $this->TicketMessages->newEntity();
        if ($this->request->is('post')) 
        {
        
            $ticket_messages = $this->TicketMessages->newEntity($this->request->data);
            $ticket_messages->ticket_id = $id;
            $ticket_messages->head = 0;
            
            if ($this->TicketMessages->save($ticket_messages))
            {
                $id = $tickets->id;
                $this->Flash->success(__($id.'Yanıtın gönderildi.'));
                return $this->redirect(['action' => 'index']);
            }
      }

        $this->set('tickets_messagesForm', $tickets);      
        $this->set('tickets_messages', $query);
 
    }
     
}

















