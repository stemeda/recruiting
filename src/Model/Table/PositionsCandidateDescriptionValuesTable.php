<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PositionsCandidateDescriptionValues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Positions
 * @property \Cake\ORM\Association\BelongsTo $CandidateDescriptionValues
 *
 * @method \App\Model\Entity\PositionsCandidateDescriptionValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\PositionsCandidateDescriptionValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PositionsCandidateDescriptionValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PositionsCandidateDescriptionValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionsCandidateDescriptionValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PositionsCandidateDescriptionValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PositionsCandidateDescriptionValue findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PositionsCandidateDescriptionValuesTable extends Table
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

        $this->table('positions_candidate_description_values');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Positions', [
            'foreignKey' => 'positions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CandidateDescriptionValues', [
            'foreignKey' => 'candidate_description_values_id',
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
            ->boolean('needed')
            ->requirePresence('needed', 'create')
            ->notEmpty('needed');

        $validator
            ->integer('importance')
            ->requirePresence('importance', 'create')
            ->notEmpty('importance');

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
        $rules->add($rules->existsIn(['positions_id'], 'Positions'));
        $rules->add($rules->existsIn(['candidate_description_values_id'], 'CandidateDescriptionValues'));

        return $rules;
    }
}
