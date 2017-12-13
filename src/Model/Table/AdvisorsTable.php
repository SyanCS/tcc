<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Advisors Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Advisor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Advisor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Advisor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Advisor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Advisor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Advisor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Advisor findOrCreate($search, callable $callback = null, $options = [])
 */
class AdvisorsTable extends Table
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

        $this->setTable('advisors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->scalar('student')
            ->requirePresence('student', 'create')
            ->notEmpty('student');

        $validator
            ->scalar('institution')
            ->requirePresence('institution', 'create')
            ->notEmpty('institution');

        $validator
            ->scalar('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
