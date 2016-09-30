<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CansCanDesValuesCanDesExtras Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CandidatesCandidateDescriptionValues
 * @property \Cake\ORM\Association\BelongsTo $CandidateDescriptionExtras
 *
 * @method \App\Model\Entity\CansCanDesValuesCanDesExtra get($primaryKey, $options = [])
 * @method \App\Model\Entity\CansCanDesValuesCanDesExtra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CansCanDesValuesCanDesExtra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CansCanDesValuesCanDesExtra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CansCanDesValuesCanDesExtra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CansCanDesValuesCanDesExtra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CansCanDesValuesCanDesExtra findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CansCanDesValuesCanDesExtrasTable extends Table
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

        $this->table('cans_can_des_values_can_des_extras');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CandidatesCandidateDescriptionValues', [
            'foreignKey' => 'candidates_candidate_description_values_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CandidateDescriptionExtras', [
            'foreignKey' => 'candidate_description_extras_id',
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
            ->requirePresence('value', 'create')
            ->notEmpty('value');

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
        $rules->add($rules->existsIn(['candidates_candidate_description_values_id'], 'CandidatesCandidateDescriptionValues'));
        $rules->add($rules->existsIn(['candidate_description_extras_id'], 'CandidateDescriptionExtras'));

        return $rules;
    }
}
