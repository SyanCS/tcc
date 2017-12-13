<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\UsersTypesTable|\Cake\ORM\Association\BelongsTo $UsersTypes
 * @property \App\Model\Table\AcademicDegreesTable|\Cake\ORM\Association\HasMany $AcademicDegrees
 * @property \App\Model\Table\AdvisorsTable|\Cake\ORM\Association\HasMany $Advisors
 * @property \App\Model\Table\AwardsTable|\Cake\ORM\Association\HasMany $Awards
 * @property \App\Model\Table\ClassroomsTable|\Cake\ORM\Association\HasMany $Classrooms
 * @property \App\Model\Table\MainInfosTable|\Cake\ORM\Association\HasMany $MainInfos
 * @property \App\Model\Table\ProfitionalPositionsTable|\Cake\ORM\Association\HasMany $ProfitionalPositions
 * @property \App\Model\Table\PublicationsTable|\Cake\ORM\Association\HasMany $Publications
 * @property \App\Model\Table\ResearchsTable|\Cake\ORM\Association\HasMany $Researchs
 * @property \App\Model\Table\ResumesTable|\Cake\ORM\Association\HasMany $Resumes
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('UsersTypes', [
            'foreignKey' => 'users_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AcademicDegrees', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Advisors', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Awards', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Classrooms', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('MainInfos', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ProfitionalPositions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Publications', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Researchs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Resumes', [
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('username')
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->scalar('password')
            ->allowEmpty('password');

        $validator
            ->dateTime('reg_date')
            ->allowEmpty('reg_date');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['users_type_id'], 'UsersTypes'));

        return $rules;
    }
}
