<?php

namespace App\Model\Table;

use Cake\Validation\Validator;

use Cake\ORM\Table;

use Cake\Utility\Text;

class UsuariosTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmptyString('nombre', false)
            ->maxLength('nombre', 80)

            ->allowEmptyString('apellido', false)
            ->maxLength('apellido', 80)

            ->allowEmptyString('cuit', false)
            ->maxLength('cuit', 11)

            ->allowEmptyString('nickname', false)
            ->maxLength('nickname', 45)

            ->allowEmptyString('email', false)
            ->maxLength('email', 100)
            ->add(
                'nickname', 
                ['unique' => [
                    'rule' => 'validateUnique', 
                    'provider' => 'table', 
                    'message' => 'nickname ya utilizado']
                ]
                );    


        return $validator;
    }
}