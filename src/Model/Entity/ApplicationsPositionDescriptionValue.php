<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApplicationsPositionDescriptionValue Entity
 *
 * @property int $id
 * @property int $applications_id
 * @property int $positions_description_values_id
 * @property string $extra_field_value
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\PositionDescriptionValue $position_description_value
 */
class ApplicationsPositionDescriptionValue extends Entity
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
