<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commentaire Model
 *
 * @property \App\Model\Table\VisiteursTable&\Cake\ORM\Association\BelongsTo $Visiteurs
 * @property \App\Model\Table\ModelesTable&\Cake\ORM\Association\BelongsTo $Modeles
 *
 * @method \App\Model\Entity\Commentaire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Commentaire newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Commentaire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commentaire|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commentaire saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commentaire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Commentaire[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commentaire findOrCreate($search, callable $callback = null, $options = [])
 */
class CommentaireTable extends Table
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

        $this->setTable('commentaire');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Visiteurs', [
            'foreignKey' => 'visiteur_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Modeles', [
            'foreignKey' => 'modele_id',
            'joinType' => 'INNER',
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
            ->scalar('commentaire')
            ->requirePresence('commentaire', 'create')
            ->notEmptyString('commentaire');

        $validator
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmptyDateTime('date');

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
        $rules->add($rules->existsIn(['visiteur_id'], 'Visiteurs'));
        $rules->add($rules->existsIn(['modele_id'], 'Modeles'));

        return $rules;
    }
}
