<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PositionDescriptionValue Entity
 *
 * @property int $id
 * @property int $positions_descriptions_id
 * @property string $name
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\PositionDescription $position_description
 * @property \App\Model\Entity\Application[] $applications
 * @property \App\Model\Entity\Position[] $positions
 */
class PositionDescriptionValue extends Entity
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
        'id' => false
    ];
}
