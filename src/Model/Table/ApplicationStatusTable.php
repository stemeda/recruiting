<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicationStatus Model
 *
 * @property \Cake\ORM\Association\HasMany $Applications
 *
 * @method \App\Model\Entity\ApplicationStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApplicationStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApplicationStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationStatus findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApplicationStatusTable extends Table
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

        $this->table('application_status');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Applications', [
            'foreignKey' => 'application_status_id'
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
            ->boolean('closes_application')
            ->requirePresence('closes_application', 'create')
            ->notEmpty('closes_application');

        return $validator;
    }
}
