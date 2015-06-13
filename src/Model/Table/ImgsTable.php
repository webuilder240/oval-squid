<?php
namespace App\Model\Table;

use App\Model\Entity\Img;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Imgs Model
 *
 */
class ImgsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('imgs');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->add('size', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('size');
            
        $validator
            ->add('original_width', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('original_width');
            
        $validator
            ->add('original_height', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('original_height');

        return $validator;
    }
}
