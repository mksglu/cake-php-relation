<?php

namespace App\Model\Table;

use Cake\ORM\Table;
// use Cake\Validation\Validator;

class TicketMessagesTable extends Table
{
    public   function initialize(array $config)
    {

        parent::initialize($config);
/*
        $this->table('ticket_messages');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Tickets', [  //ManyToOne belongsTo
             'foreignKey' => 'id',  
             'joinType' => 'INNER'        
        ]);https://www.youtube.com/watch?v=nOjyUm4G2Bc
*/
$this->table('ticket_messages');
$this->displayField('id');
$this->primaryKey('id');
$this->addBehavior('Timestamp');
$this->belongsTo('Tickets', [
    'foreignKey' => 'ticket_id',
    'joinType' => 'INNER'    
]);
     
 
    }
   
}
