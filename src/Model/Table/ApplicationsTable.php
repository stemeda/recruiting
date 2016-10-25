<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Applications Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Candidates
 * @property \Cake\ORM\Association\BelongsTo $Positions
 * @property \Cake\ORM\Association\BelongsTo $ApplicationStatus
 * @property \Cake\ORM\Association\BelongsToMany $PositionDescriptionValues
 * @property \Cake\ORM\Association\HasMany $Attachments
 *
 * @method \App\Model\Entity\Application get($primaryKey, $options = [])
 * @method \App\Model\Entity\Application newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Application[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Application|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Application patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Application[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Application findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApplicationsTable extends Table
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

        $this->table('applications');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Attachments.Attachments');

        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidates_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Positions', [
            'foreignKey' => 'positions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ApplicationStatus', [
            'foreignKey' => 'application_status_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ApplicationsPositionDescriptionValues', [
            'foreignKey' => 'applications_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsToMany('PositionDescriptionValues', [
            'foreignKey' => 'applications_id',
            'targetForeignKey' => 'position_description_value_id',
            'joinTable' => 'applications_position_description_values'
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
            ->integer('minimal_pay')
            ->allowEmpty('minimal_pay');

        $validator
            ->date('earliest_start')
            ->requirePresence('earliest_start', 'create')
            ->notEmpty('earliest_start');

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
        $rules->add($rules->existsIn(['positions_id'], 'Positions'));
        $rules->add($rules->existsIn(['application_status_id'], 'ApplicationStatus'));

        return $rules;
    }
}
