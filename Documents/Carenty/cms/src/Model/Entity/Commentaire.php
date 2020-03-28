<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Commentaire Entity
 *
 * @property int $id
 * @property int $visiteur_id
 * @property int $modele_id
 * @property string $commentaire
 * @property \Cake\I18n\FrozenTime $date
 *
 * @property \App\Model\Entity\Visiteur $visiteur
 * @property \App\Model\Entity\Modele $modele
 */
class Commentaire extends Entity
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
        'visiteur_id' => true,
        'modele_id' => true,
        'commentaire' => true,
        'date' => true,
        'visiteur' => true,
        'modele' => true,
    ];
}
