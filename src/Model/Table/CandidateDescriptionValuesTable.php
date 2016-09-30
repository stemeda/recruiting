<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CandidateDescriptionValues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CandidateDescriptions
 * @property \Cake\ORM\Association\BelongsToMany $Candidates
 * @property \Cake\ORM\Association\BelongsToMany $Positions
 * @property \Cake\ORM\Association\HasMany $CandidatesCandidateDescriptionValues
 * @property \Cake\ORM\Association\HasMany $PositionsCandidateDescriptionValues
 *
 * @method \App\Model\Entity\CandidateDescriptionValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\CandidateDescriptionValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CandidateDescriptionValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDescriptionValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateDescriptionValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDescriptionValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDescriptionValue findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CandidateDescriptionValuesTable extends Table
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

        $this->table('candidate_description_values');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CandidateDescriptions', [
            'foreignKey' => 'candidate_descriptions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Candidates', [
            'foreignKey' => 'candidate_description_value_id',
            'targetForeignKey' => 'candidate_id',
            'joinTable' => 'candidates_candidate_description_values'
        ]);
        $this->belongsToMany('Positions', [
            'foreignKey' => 'candidate_description_value_id',
            'targetForeignKey' => 'position_id',
            'joinTable' => 'positions_candidate_description_values'
        ]);
        $this->hasMany('CandidatesCandidateDescriptionValues', [
            'foreignKey' => 'candidate_description_values_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('PositionsCandidateDescriptionValues', [
            'foreignKey' => 'candidate_description_values_id',
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
        $rules->add($rules->existsIn(['candidate_descriptions_id'], 'CandidateDescriptions'));

        return $rules;
    }
}
