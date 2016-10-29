<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CandidatesCandidateDescriptionValues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Candidates
 * @property \Cake\ORM\Association\BelongsTo $CandidateDescriptionValues
 *
 * @method \App\Model\Entity\CandidatesCandidateDescriptionValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\CandidatesCandidateDescriptionValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CandidatesCandidateDescriptionValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CandidatesCandidateDescriptionValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidatesCandidateDescriptionValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CandidatesCandidateDescriptionValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CandidatesCandidateDescriptionValue findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CandidatesCandidateDescriptionValuesTable extends Table
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

        $this->table('candidates_candidate_description_values');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidates_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CandidateDescriptionValues', [
            'foreignKey' => 'candidate_description_values_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CansCanDesValuesCanDesExtras', [
            'foreignKey' => 'candidates_candidate_description_values_id',
            'joinType' => 'LEFT',
            'dependent' => true,
            'cascadeCallbacks' => true,
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
        $rules->add($rules->existsIn(['candidates_id'], 'Candidates'));
        $rules->add($rules->existsIn(['candidate_description_values_id'], 'CandidateDescriptionValues'));

        return $rules;
    }
}
