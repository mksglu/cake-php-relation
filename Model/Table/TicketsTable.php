<?php

namespace App\Model\Table;

use Cake\ORM\Table;
// use Cake\Validation\Validator;

class TicketsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('TicketMessages', [
            'foreignKey' => 'id',
            'joinTable' => 'tickets'
        ]);
      
     
    }

/**
 * usersTable -> user_id
 * userTable => hasOne
 * 
 * ticketTable -> userId
 * ticketsTable => hasOne
 * 
 * tickets hasMany replies
 * replies belongsTo tickets
 */

    // public function validationDefault(Validator $validator)
    // {
    //     $validator
    //         ->notEmpty('message','sds')
    //         ->notEmpty('userId');
           

    //     return $validator;
    // }   
}
