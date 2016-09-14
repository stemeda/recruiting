<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StellenHasZusatzqualifikationen Entity
 *
 * @property int $stellen_id
 * @property int $zusatzqualifikationen_id
 * @property int $priotitaet
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Stellen $stellen
 * @property \App\Model\Entity\Zusatzqualifikationen $zusatzqualifikationen
 */
class StellenHasZusatzqualifikationen extends Entity
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
        'stellen_id' => false,
        'zusatzqualifikationen_id' => false
    ];
}
