<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CansCanDesValuesCanDesExtra Entity
 *
 * @property int $id
 * @property int $candidates_candidate_description_values_id
 * @property int $candidate_description_extras_id
 * @property string $value
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\CandidatesCandidateDescriptionValue $candidates_candidate_description_value
 * @property \App\Model\Entity\CandidateDescriptionExtra $candidate_description_extra
 */
class CansCanDesValuesCanDesExtra extends Entity
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
