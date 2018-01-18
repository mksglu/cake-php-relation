<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TicketsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

		$this->table('tickets');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');
		$this->hasMany('TicketMessages', [
		    'foreignKey' => 'ticket_id'    
		]);    
     
    }
 
}
