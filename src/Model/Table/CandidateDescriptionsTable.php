<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CandidateDescriptions Model
 *
 * @property \Cake\ORM\Association\HasMany $CandidateDescriptionValues
 * @property \Cake\ORM\Association\HasMany $CandidateDescriptionExtras
 *
 * @method \App\Model\Entity\CandidateDescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\CandidateDescription newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CandidateDescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDescription|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDescription findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CandidateDescriptionsTable extends Table
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

        $this->table('candidate_descriptions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CandidateDescriptionValues', [
            'foreignKey' => 'candidate_descriptions_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('CandidateDescriptionExtras', [
            'foreignKey' => 'candidate_descriptions_id',
            'joinType' => 'LEFT'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->boolean('multiple')
            ->requirePresence('multiple', 'create')
            ->notEmpty('multiple');

        $validator
            ->boolean('needed')
            ->requirePresence('needed', 'create')
            ->notEmpty('needed');

        return $validator;
    }
}
