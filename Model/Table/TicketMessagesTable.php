<?php

namespace App\Model\Table;

use Cake\ORM\Table;
// use Cake\Validation\Validator;

class TicketMessagesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tickets', [
            'foreignKey' => 'ticketId',
            'joinType' => 'INNER'
        ]);
    }
   
}
