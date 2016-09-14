<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AbschluesseHasStellen Entity
 *
 * @property int $abschluesse_id
 * @property int $stellen_id
 * @property int $priotitaet
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Abschluesse $abschluesse
 * @property \App\Model\Entity\Stellen $stellen
 */
class AbschluesseHasStellen extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'abschluesse_id' => false,
        'stellen_id' => false
    ];
}
