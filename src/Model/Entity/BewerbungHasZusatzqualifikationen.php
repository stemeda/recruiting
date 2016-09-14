<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BewerbungHasZusatzqualifikationen Entity
 *
 * @property int $bewerbung_id
 * @property int $zusatzqualifikationen_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Bewerbung $bewerbung
 * @property \App\Model\Entity\Zusatzqualifikationen $zusatzqualifikationen
 */
class BewerbungHasZusatzqualifikationen extends Entity
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
        'bewerbung_id' => false,
        'zusatzqualifikationen_id' => false
    ];
}
