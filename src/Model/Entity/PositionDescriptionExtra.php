<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PositionDescriptionExtra Entity
 *
 * @property int $id
 * @property int $position_descriptions_id
 * @property string $name
 * @property string $type
 * @property string $settings
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\PositionDescription $position_description
 */
class PositionDescriptionExtra extends Entity
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
