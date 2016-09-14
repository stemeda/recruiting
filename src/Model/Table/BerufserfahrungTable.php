<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Berufserfahrung Model
 *
 * @property \Cake\ORM\Association\HasMany $StellenHasBerufserfahrung
 *
 * @method \App\Model\Entity\Berufserfahrung get($primaryKey, $options = [])
 * @method \App\Model\Entity\Berufserfahrung newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Berufserfahrung[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Berufserfahrung|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Berufserfahrung patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Berufserfahrung[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Berufserfahrung findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BerufserfahrungTable extends Table
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

        $this->table('berufserfahrung');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('StellenHasBerufserfahrung', [
            'foreignKey' => 'berufserfahrung_id'
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
}
