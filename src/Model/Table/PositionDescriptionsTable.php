<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PositionDescriptions Model
 *
 * @method \App\Model\Entity\PositionDescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\PositionDescription newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PositionDescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PositionDescription|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PositionDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PositionDescription findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PositionDescriptionsTable extends Table
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

        $this->table('position_descriptions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Search.Search');

        $this->hasMany('PositionDescriptionValues', [
            'foreignKey' => 'positions_descriptions_id',
            'joinType' => 'LEFT',
        ]);
        $this->hasMany('PositionDescriptionExtras', [
            'foreignKey' => 'position_descriptions_id',
            'joinType' => 'LEFT',
        ]);

        // Setup search filter using search manager
        $this->searchManager()
                // Here we will alias the 'q' query param to search the `Articles.title`
                // field and the `Articles.content` field, using a LIKE match, with `%`
                // both before and after.
                ->add('name', 'Search.Like', [
                    'before' => true,
                    'after' => true,
                    'comparison' => 'LIKE',
                    'field' => ['name'],
                    'filterEmpty' => true
                ])
                ->add('Mehrfachauswahl', 'Search.Boolean', [
                    'field' => 'multiple',
                    'filterEmpty' => true
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
            ->boolean('multiple')
            ->requirePresence('multiple', 'create')
            ->notEmpty('multiple');

        return $validator;
    }
}
