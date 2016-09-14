<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BewerbungHasZusatzqualifikationen Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Bewerbung
 * @property \Cake\ORM\Association\BelongsTo $Zusatzqualifikationen
 *
 * @method \App\Model\Entity\BewerbungHasZusatzqualifikationen get($primaryKey, $options = [])
 * @method \App\Model\Entity\BewerbungHasZusatzqualifikationen newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BewerbungHasZusatzqualifikationen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BewerbungHasZusatzqualifikationen|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BewerbungHasZusatzqualifikationen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BewerbungHasZusatzqualifikationen[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BewerbungHasZusatzqualifikationen findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BewerbungHasZusatzqualifikationenTable extends Table
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

        $this->table('bewerbung_has_zusatzqualifikationen');
        $this->displayField('bewerbung_id');
        $this->primaryKey(['bewerbung_id', 'zusatzqualifikationen_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Bewerbung', [
            'foreignKey' => 'bewerbung_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Zusatzqualifikationen', [
            'foreignKey' => 'zusatzqualifikationen_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['bewerbung_id'], 'Bewerbung'));
        $rules->add($rules->existsIn(['zusatzqualifikationen_id'], 'Zusatzqualifikationen'));

        return $rules;
    }
}
