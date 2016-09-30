<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CandidateDescriptionExtras Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CandidateDescriptions
 * @property \Cake\ORM\Association\HasMany $CansCanDesValuesCanDesExtras
 *
 * @method \App\Model\Entity\CandidateDescriptionExtra get($primaryKey, $options = [])
 * @method \App\Model\Entity\CandidateDescriptionExtra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CandidateDescriptionExtra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDescriptionExtra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CandidateDescriptionExtra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDescriptionExtra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CandidateDescriptionExtra findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CandidateDescriptionExtrasTable extends Table
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

        $this->table('candidate_description_extras');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CandidateDescriptions', [
            'foreignKey' => 'candidate_descriptions_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CansCanDesValuesCanDesExtras', [
            'foreignKey' => 'candidate_description_extras_id',
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
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->allowEmpty('settings');

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
        $rules->add($rules->existsIn(['candidate_descriptions_id'], 'CandidateDescriptions'));

        return $rules;
    }
}
