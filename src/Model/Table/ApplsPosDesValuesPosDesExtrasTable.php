<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplsPosDesValuesPosDesExtras Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ApplicationsPositionDescriptionValues
 * @property \Cake\ORM\Association\BelongsTo $PositionDescriptionExtras
 *
 * @method \App\Model\Entity\ApplsPosDesValuesPosDesExtra get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApplsPosDesValuesPosDesExtra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApplsPosDesValuesPosDesExtra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApplsPosDesValuesPosDesExtra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplsPosDesValuesPosDesExtra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApplsPosDesValuesPosDesExtra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApplsPosDesValuesPosDesExtra findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApplsPosDesValuesPosDesExtrasTable extends Table
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

        $this->table('appls_pos_des_values_pos_des_extras');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ApplicationsPositionDescriptionValues', [
            'foreignKey' => 'applications_position_description_values_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PositionDescriptionExtras', [
            'foreignKey' => 'position_description_extras_id',
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
        $rules->add($rules->existsIn(['applications_position_description_values_id'], 'ApplicationsPositionDescriptionValues'));
        $rules->add($rules->existsIn(['position_description_extras_id'], 'PositionDescriptionExtras'));

        return $rules;
    }
}
