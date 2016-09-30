<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PositionDescriptionValues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PositionDescriptions
 * @property \Cake\ORM\Association\BelongsToMany $Applications
 * @property \Cake\ORM\Association\BelongsToMany $Positions
 * @property \Cake\ORM\Association\HasMany $PositionsPositionDescriptionValues
 * @property \Cake\ORM\Association\HasMany $ApplicationsPositionDescriptionValues
 *
 * @method \App\Model\Entity\PositionDescriptionValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\PositionDescriptionValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PositionDescriptionValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PositionDescriptionValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionDescriptionValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PositionDescriptionValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PositionDescriptionValue findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PositionDescriptionValuesTable extends Table
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

        $this->table('position_description_values');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PositionDescriptions', [
            'foreignKey' => 'positions_descriptions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Applications', [
            'foreignKey' => 'position_description_value_id',
            'targetForeignKey' => 'application_id',
            'joinTable' => 'applications_position_description_values'
        ]);
        $this->belongsToMany('Positions', [
            'foreignKey' => 'position_description_value_id',
            'targetForeignKey' => 'position_id',
            'joinTable' => 'positions_position_description_values'
        ]);
        $this->hasMany('PositionsPositionDescriptionValues', [
            'foreignKey' => 'positions_description_values_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('ApplicationsPositionDescriptionValues', [
            'foreignKey' => 'positions_description_values_id',
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
        $rules->add($rules->existsIn(['positions_descriptions_id'], 'PositionDescriptions'));

        return $rules;
    }
}
