<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pret Entity
 *
 * @property int $id
 * @property int $donneur_id
 * @property int $receveur_id
 * @property \Cake\I18n\FrozenTime $debut
 * @property \Cake\I18n\FrozenTime $fin
 * @property int $status
 *
 * @property \App\Model\Entity\Visiteur $visiteur
 */
class Pret extends Entity
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
        'donneur_id' => true,
        'receveur_id' => true,
        'debut' => true,
        'fin' => true,
        'status' => true,
        'visiteur' => true,
    ];
}
