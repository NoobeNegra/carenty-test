<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TypeDisponibilite Entity
 *
 * @property int $id
 * @property string $nom
 *
 * @property \App\Model\Entity\Outil[] $outils
 */
class TypeDisponibilite extends Entity
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
        'nom' => true,
        'outils' => true,
    ];
}
