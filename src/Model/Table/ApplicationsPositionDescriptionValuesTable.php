<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicationsPositionDescriptionValues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Applications
 * @property \Cake\ORM\Association\BelongsTo $PositionDescriptionValues
 *
 * @method \App\Model\Entity\ApplicationsPositionDescriptionValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApplicationsPositionDescriptionValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApplicationsPositionDescriptionValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationsPositionDescriptionValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationsPositionDescriptionValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationsPositionDescriptionValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationsPositionDescriptionValue findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApplicationsPositionDescriptionValuesTable extends Table
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

        $this->table('applications_position_description_values');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Applications', [
            'foreignKey' => 'applications_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PositionDescriptionValues', [
            'foreignKey' => 'positions_description_values_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('PositionDescriptionExtras', [
            'foreignKey' => 'applications_position_description_values_id',
            'targetForeignKey' => 'position_description_extras_id',
            'joinTable' => 'appls_pos_des_values_pos_des_extras'
        ]);
        $this->hasMany('ApplsPosDesValuesPosDesExtras', [
            'foreignKey' => 'applications_position_description_values_id',
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
            ->allowEmpty('extra_field_value');

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
        $rules->add($rules->existsIn(['applications_id'], 'Applications'));
        $rules->add($rules->existsIn(['positions_description_values_id'], 'PositionDescriptionValues'));

        return $rules;
    }
}
