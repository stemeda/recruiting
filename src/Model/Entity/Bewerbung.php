<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bewerbung Entity
 *
 * @property int $id
 * @property int $stellen_id
 * @property int $abschluesse_id
 * @property int $bewerbung_status_id
 * @property string $vorname
 * @property string $nachname
 * @property string $email
 * @property \Cake\I18n\Time $benachrichtigung
 * @property float $abschluss_note
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Stellen $stellen
 * @property \App\Model\Entity\Abschluesse $abschluesse
 * @property \App\Model\Entity\BewerbungStatus $bewerbung_status
 */
class Bewerbung extends Entity
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
        'id' => false,
        'stellen_id' => false,
        'abschluesse_id' => false,
        'bewerbung_status_id' => false
    ];
}
