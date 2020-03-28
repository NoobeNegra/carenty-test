<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Outils Model
 *
 * @property \App\Model\Table\VisiteursTable&\Cake\ORM\Association\BelongsTo $Visiteurs
 * @property \App\Model\Table\TypeDisponibiliteTable&\Cake\ORM\Association\BelongsTo $TypeDisponibilite
 *
 * @method \App\Model\Entity\Outil get($primaryKey, $options = [])
 * @method \App\Model\Entity\Outil newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Outil[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Outil|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Outil saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Outil patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Outil[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Outil findOrCreate($search, callable $callback = null, $options = [])
 */
class OutilsTable extends Table
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

        $this->setTable('outils');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Visiteurs', [
            'foreignKey' => 'visiteur_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TypeDisponibilite', [
            'foreignKey' => 'type_disponibilite_id',
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
            ->scalar('nom')
            ->maxLength('nom', 100)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->scalar('modele')
            ->maxLength('modele', 100)
            ->allowEmptyString('modele');

        $validator
            ->scalar('nro_serie')
            ->maxLength('nro_serie', 100)
            ->allowEmptyString('nro_serie');

        $validator
            ->scalar('presentation')
            ->allowEmptyString('presentation');

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
        $rules->add($rules->existsIn(['type_disponibilite_id'], 'TypeDisponibilite'));

        return $rules;
    }
}
