<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Positions Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $CandidateDescriptionValues
 * @property \Cake\ORM\Association\BelongsToMany $PositionDescriptionValues
 * @property \Cake\ORM\Association\HasMany $PositionsPositionDescriptionValues
 * @property \Cake\ORM\Association\HasMany $PositionsCandidateDescriptionValues
 *
 * @method \App\Model\Entity\Position get($primaryKey, $options = [])
 * @method \App\Model\Entity\Position newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Position[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Position|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Position patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Position[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Position findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PositionsTable extends Table
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

        $this->table('positions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('CandidateDescriptionValues', [
            'foreignKey' => 'positions_id',
            'targetForeignKey' => 'candidate_description_value_id',
            'joinTable' => 'positions_candidate_description_values'
        ]);
        $this->belongsToMany('PositionDescriptionValues', [
            'foreignKey' => 'positions_id',
            'targetForeignKey' => 'position_description_value_id',
            'joinTable' => 'positions_position_description_values'
        ]);
        $this->hasMany('PositionsPositionDescriptionValues', [
            'foreignKey' => 'positions_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('PositionsCandidateDescriptionValues', [
            'foreignKey' => 'positions_id',
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
            ->allowEmpty('description');

        $validator
            ->dateTime('awailable_from')
            ->requirePresence('awailable_from', 'create')
            ->notEmpty('awailable_from');

        $validator
            ->dateTime('awaibale_until')
            ->requirePresence('awaibale_until', 'create')
            ->notEmpty('awaibale_until');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        return $validator;
    }
}
