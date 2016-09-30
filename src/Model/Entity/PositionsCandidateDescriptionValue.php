<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PositionsCandidateDescriptionValue Entity
 *
 * @property int $id
 * @property int $positions_id
 * @property int $candidate_description_values_id
 * @property bool $needed
 * @property int $importance
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\CandidateDescriptionValue $candidate_description_value
 */
class PositionsCandidateDescriptionValue extends Entity
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
