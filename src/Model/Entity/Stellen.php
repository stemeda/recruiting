<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stellen Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $manuellPruefen
 * @property int $vorstellungsgespraeche
 * @property \Cake\I18n\Time $ausschreiben_von
 * @property \Cake\I18n\Time $ausschreiben_bis
 * @property \Cake\I18n\Time $einstellung_ab
 * @property string $created
 * @property string $modified
 *
 * @property \App\Model\Entity\AbschluesseHasStellen[] $abschluesse_has_stellen
 * @property \App\Model\Entity\Bewerbung[] $bewerbung
 * @property \App\Model\Entity\StellenHasBerufserfahrung[] $stellen_has_berufserfahrung
 * @property \App\Model\Entity\StellenHasZusatzqualifikationen[] $stellen_has_zusatzqualifikationen
 */
class Stellen extends Entity
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
