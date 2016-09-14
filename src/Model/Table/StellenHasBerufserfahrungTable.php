<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StellenHasBerufserfahrung Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Stellen
 * @property \Cake\ORM\Association\BelongsTo $Berufserfahrung
 *
 * @method \App\Model\Entity\StellenHasBerufserfahrung get($primaryKey, $options = [])
 * @method \App\Model\Entity\StellenHasBerufserfahrung newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StellenHasBerufserfahrung[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StellenHasBerufserfahrung|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StellenHasBerufserfahrung patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StellenHasBerufserfahrung[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StellenHasBerufserfahrung findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StellenHasBerufserfahrungTable extends Table
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

        $this->table('stellen_has_berufserfahrung');
        $this->displayField('stellen_id');
        $this->primaryKey(['stellen_id', 'berufserfahrung_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Stellen', [
            'foreignKey' => 'stellen_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Berufserfahrung', [
            'foreignKey' => 'berufserfahrung_id',
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
            ->integer('priotitaet')
            ->requirePresence('priotitaet', 'create')
            ->notEmpty('priotitaet');

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
        $rules->add($rules->existsIn(['stellen_id'], 'Stellen'));
        $rules->add($rules->existsIn(['berufserfahrung_id'], 'Berufserfahrung'));

        return $rules;
    }
}
