<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Visiteurs Model
 *
 * @property \App\Model\Table\CommentaireTable&\Cake\ORM\Association\HasMany $Commentaire
 * @property \App\Model\Table\OutilsTable&\Cake\ORM\Association\HasMany $Outils
 *
 * @method \App\Model\Entity\Visiteur get($primaryKey, $options = [])
 * @method \App\Model\Entity\Visiteur newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Visiteur[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Visiteur|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Visiteur saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Visiteur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Visiteur[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Visiteur findOrCreate($search, callable $callback = null, $options = [])
 */
class VisiteursTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('visiteurs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Commentaire', [
            'foreignKey' => 'visiteur_id',
        ]);
        $this->hasMany('Outils', [
            'foreignKey' => 'visiteur_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 100)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->scalar('prenom')
            ->maxLength('prenom', 100)
            ->requirePresence('prenom', 'create')
            ->notEmptyString('prenom');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('source')
            ->maxLength('source', 4)
            ->notEmptyString('source');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
