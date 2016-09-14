<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stellen Model
 *
 * @property \Cake\ORM\Association\HasMany $AbschluesseHasStellen
 * @property \Cake\ORM\Association\HasMany $Bewerbung
 * @property \Cake\ORM\Association\HasMany $StellenHasBerufserfahrung
 * @property \Cake\ORM\Association\HasMany $StellenHasZusatzqualifikationen
 *
 * @method \App\Model\Entity\Stellen get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stellen newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stellen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stellen|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stellen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stellen[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stellen findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StellenTable extends Table
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

        $this->table('stellen');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('AbschluesseHasStellen', [
            'foreignKey' => 'stellen_id'
        ]);
        $this->hasMany('Bewerbung', [
            'foreignKey' => 'stellen_id'
        ]);
        $this->hasMany('StellenHasBerufserfahrung', [
            'foreignKey' => 'stellen_id'
        ]);
        $this->hasMany('StellenHasZusatzqualifikationen', [
            'foreignKey' => 'stellen_id'
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

        $validator
            ->integer('manuellPruefen')
            ->requirePresence('manuellPruefen', 'create')
            ->notEmpty('manuellPruefen');

        $validator
            ->integer('vorstellungsgespraeche')
            ->requirePresence('vorstellungsgespraeche', 'create')
            ->notEmpty('vorstellungsgespraeche');

        $validator
            ->dateTime('ausschreiben_von')
            ->requirePresence('ausschreiben_von', 'create')
            ->notEmpty('ausschreiben_von');

        $validator
            ->dateTime('ausschreiben_bis')
            ->requirePresence('ausschreiben_bis', 'create')
            ->notEmpty('ausschreiben_bis');

        $validator
            ->dateTime('einstellung_ab')
            ->requirePresence('einstellung_ab', 'create')
            ->notEmpty('einstellung_ab');

        return $validator;
    }
}
