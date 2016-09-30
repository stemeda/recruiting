<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Application Entity
 *
 * @property int $id
 * @property int $candidates_id
 * @property int $positions_id
 * @property int $application_status_id
 * @property int $minimal_pay
 * @property \Cake\I18n\Time $earliest_start
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Candidate $candidate
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\ApplicationStatus $application_status
 * @property \App\Model\Entity\PositionDescriptionValue[] $position_description_values
 */
class Application extends Entity
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
