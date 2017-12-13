<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;


/**
 * Researchs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ResearchMembersTable|\Cake\ORM\Association\HasMany $ResearchMembers
 *
 * @method \App\Model\Entity\Research get($primaryKey, $options = [])
 * @method \App\Model\Entity\Research newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Research[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Research|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Research patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Research[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Research findOrCreate($search, callable $callback = null, $options = [])
 */
class ResearchsTable extends Table
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

        $this->setTable('researchs');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ResearchMembers', [
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
            ->scalar('institution')
            ->requirePresence('institution', 'create')
            ->notEmpty('institution');

        $validator
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('descr')
            ->allowEmpty('descr');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmpty('end_date');

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

    public function beforeMarshal(Event $event,$data)
    {
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];

        if (isset($start_date)) {
            $year = substr($start_date, 6);
            $month = substr($start_date, 3,-5);
            $day = substr($start_date, 0,-8);
            $data['start_date'] =  $year."-".$month."-".$day;
        }
        if (isset($end_date)) {
            $year = substr($end_date, 6);
            $month = substr($end_date, 3,-5);
            $day = substr($end_date, 0,-8);
            $data['end_date'] =  $year."-".$month."-".$day;
        }
    }
    
}
