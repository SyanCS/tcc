<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersTypes Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\UsersType get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersType findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Users', [
            'foreignKey' => 'users_type_id'
        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->dateTime('reg_date')
            ->requirePresence('reg_date', 'create')
            ->notEmpty('reg_date');

        return $validator;
    }
}
