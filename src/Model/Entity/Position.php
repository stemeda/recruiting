<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Position Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\Time $awailable_from
 * @property \Cake\I18n\Time $awaibale_until
 * @property bool $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\CandidateDescriptionValue[] $candidate_description_values
 * @property \App\Model\Entity\PositionDescriptionValue[] $position_description_values
 */
class Position extends Entity
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
