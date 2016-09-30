<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PositionsPositionDescriptionValues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Positions
 * @property \Cake\ORM\Association\BelongsTo $PositionDescriptionValues
 *
 * @method \App\Model\Entity\PositionsPositionDescriptionValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\PositionsPositionDescriptionValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PositionsPositionDescriptionValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PositionsPositionDescriptionValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionsPositionDescriptionValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PositionsPositionDescriptionValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PositionsPositionDescriptionValue findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PositionsPositionDescriptionValuesTable extends Table
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

        $this->table('positions_position_description_values');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Positions', [
            'foreignKey' => 'positions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PositionDescriptionValues', [
            'foreignKey' => 'positions_description_values_id',
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
        $rules->add($rules->existsIn(['positions_description_values_id'], 'PositionDescriptionValues'));

        return $rules;
    }
}
