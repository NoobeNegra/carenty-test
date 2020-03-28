<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Visiteur Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $password
 * @property string $source
 *
 * @property \App\Model\Entity\Commentaire[] $commentaire
 * @property \App\Model\Entity\Outil[] $outils
 */
class Visiteur extends Entity
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
        'prenom' => true,
        'email' => true,
        'password' => true,
        'source' => true,
        'commentaire' => true,
        'outils' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
