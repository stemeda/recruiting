<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AbschluesseHasStellen Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Abschluesse
 * @property \Cake\ORM\Association\BelongsTo $Stellen
 *
 * @method \App\Model\Entity\AbschluesseHasStellen get($primaryKey, $options = [])
 * @method \App\Model\Entity\AbschluesseHasStellen newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AbschluesseHasStellen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AbschluesseHasStellen|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AbschluesseHasStellen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AbschluesseHasStellen[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AbschluesseHasStellen findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AbschluesseHasStellenTable extends Table
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

        $this->table('abschluesse_has_stellen');
        $this->displayField('abschluesse_id');
        $this->primaryKey(['abschluesse_id', 'stellen_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Abschluesse', [
            'foreignKey' => 'abschluesse_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Stellen', [
            'foreignKey' => 'stellen_id',
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
        $rules->add($rules->existsIn(['abschluesse_id'], 'Abschluesse'));
        $rules->add($rules->existsIn(['stellen_id'], 'Stellen'));

        return $rules;
    }
}
