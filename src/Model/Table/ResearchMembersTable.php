<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResearchMembers Model
 *
 * @property \App\Model\Table\ResearchsTable|\Cake\ORM\Association\BelongsTo $Researchs
 *
 * @method \App\Model\Entity\ResearchMember get($primaryKey, $options = [])
 * @method \App\Model\Entity\ResearchMember newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ResearchMember[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResearchMember|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ResearchMember patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ResearchMember[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResearchMember findOrCreate($search, callable $callback = null, $options = [])
 */
class ResearchMembersTable extends Table
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

        $this->setTable('research_members');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Researchs', [
            'foreignKey' => 'research_id'
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
            ->boolean('coordinator')
            ->allowEmpty('coordinator');

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
        $rules->add($rules->existsIn(['research_id'], 'Researchs'));

        return $rules;
    }
}
