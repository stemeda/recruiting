<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bewerbung Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Stellen
 * @property \Cake\ORM\Association\BelongsTo $Abschluesse
 * @property \Cake\ORM\Association\BelongsTo $BewerbungStatus
 *
 * @method \App\Model\Entity\Bewerbung get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bewerbung newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bewerbung[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bewerbung|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bewerbung patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bewerbung[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bewerbung findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BewerbungTable extends Table
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

        $this->table('bewerbung');
        $this->displayField('id');
        $this->primaryKey(['id', 'stellen_id', 'abschluesse_id', 'bewerbung_status_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Stellen', [
            'foreignKey' => 'stellen_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Abschluesse', [
            'foreignKey' => 'abschluesse_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('BewerbungStatus', [
            'foreignKey' => 'bewerbung_status_id',
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
            ->requirePresence('vorname', 'create')
            ->notEmpty('vorname');

        $validator
            ->requirePresence('nachname', 'create')
            ->notEmpty('nachname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->dateTime('benachrichtigung')
            ->allowEmpty('benachrichtigung');

        $validator
            ->decimal('abschluss_note')
            ->requirePresence('abschluss_note', 'create')
            ->notEmpty('abschluss_note');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['stellen_id'], 'Stellen'));
        $rules->add($rules->existsIn(['abschluesse_id'], 'Abschluesse'));
        $rules->add($rules->existsIn(['bewerbung_status_id'], 'BewerbungStatus'));

        return $rules;
    }
}
