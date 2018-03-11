<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MainInfos Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\MainInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\MainInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MainInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MainInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MainInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MainInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MainInfo findOrCreate($search, callable $callback = null, $options = [])
 */
class MainInfosTable extends Table
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

        $this->setTable('main_infos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->scalar('photo')
            ->allowEmpty('photo');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('intro')
            ->allowEmpty('intro');

        $validator
            ->scalar('tel')
            ->allowEmpty('tel');

        $validator
            ->scalar('tel2')
            ->allowEmpty('tel2');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('location')
            ->allowEmpty('location');

        $validator
            ->scalar('availability')
            ->allowEmpty('availability');
            
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
