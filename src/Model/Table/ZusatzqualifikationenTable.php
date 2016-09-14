<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Zusatzqualifikationen Model
 *
 * @property \Cake\ORM\Association\HasMany $BewerbungHasZusatzqualifikationen
 * @property \Cake\ORM\Association\HasMany $StellenHasZusatzqualifikationen
 *
 * @method \App\Model\Entity\Zusatzqualifikationen get($primaryKey, $options = [])
 * @method \App\Model\Entity\Zusatzqualifikationen newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Zusatzqualifikationen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Zusatzqualifikationen|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zusatzqualifikationen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Zusatzqualifikationen[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Zusatzqualifikationen findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ZusatzqualifikationenTable extends Table
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

        $this->table('zusatzqualifikationen');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('BewerbungHasZusatzqualifikationen', [
            'foreignKey' => 'zusatzqualifikationen_id'
        ]);
        $this->hasMany('StellenHasZusatzqualifikationen', [
            'foreignKey' => 'zusatzqualifikationen_id'
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
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
}
