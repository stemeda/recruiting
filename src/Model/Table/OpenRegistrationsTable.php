<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OpenRegistrations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $User
 *
 * @method \App\Model\Entity\OpenRegistration get($primaryKey, $options = [])
 * @method \App\Model\Entity\OpenRegistration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OpenRegistration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OpenRegistration|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OpenRegistration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OpenRegistration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OpenRegistration findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OpenRegistrationsTable extends Table
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

        $this->table('open_registrations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Users', [
            'foreignKey' => 'user_id',
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
            ->dateTime('valid_until')
            ->requirePresence('valid_until', 'create')
            ->notEmpty('valid_until');

        $validator
            ->requirePresence('validate_key', 'create')
            ->notEmpty('validate_key');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
