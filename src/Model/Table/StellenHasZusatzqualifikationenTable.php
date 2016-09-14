<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StellenHasZusatzqualifikationen Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Stellen
 * @property \Cake\ORM\Association\BelongsTo $Zusatzqualifikationen
 *
 * @method \App\Model\Entity\StellenHasZusatzqualifikationen get($primaryKey, $options = [])
 * @method \App\Model\Entity\StellenHasZusatzqualifikationen newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StellenHasZusatzqualifikationen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StellenHasZusatzqualifikationen|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StellenHasZusatzqualifikationen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StellenHasZusatzqualifikationen[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StellenHasZusatzqualifikationen findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StellenHasZusatzqualifikationenTable extends Table
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

        $this->table('stellen_has_zusatzqualifikationen');
        $this->displayField('stellen_id');
        $this->primaryKey(['stellen_id', 'zusatzqualifikationen_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Stellen', [
            'foreignKey' => 'stellen_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Zusatzqualifikationen', [
            'foreignKey' => 'zusatzqualifikationen_id',
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
        $rules->add($rules->existsIn(['zusatzqualifikationen_id'], 'Zusatzqualifikationen'));

        return $rules;
    }
}
