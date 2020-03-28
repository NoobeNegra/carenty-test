<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Outil Entity
 *
 * @property int $id
 * @property int $visiteur_id
 * @property string $nom
 * @property int $type_disponibilite_id
 * @property string|null $modele
 * @property string|null $nro_serie
 * @property string|null $presentation
 *
 * @property \App\Model\Entity\Visiteur $visiteur
 * @property \App\Model\Entity\TypeDisponibilite $type_disponibilite
 */
class Outil extends Entity
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
        'nom' => true,
        'type_disponibilite_id' => true,
        'modele' => true,
        'nro_serie' => true,
        'presentation' => true,
        'visiteur' => true,
        'type_disponibilite' => true,
    ];
}
