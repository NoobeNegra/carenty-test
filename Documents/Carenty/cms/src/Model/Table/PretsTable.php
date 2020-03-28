<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prets Model
 *
 * @property \App\Model\Table\VisiteursTable&\Cake\ORM\Association\BelongsTo $Visiteurs
 * @property \App\Model\Table\VisiteursTable&\Cake\ORM\Association\BelongsTo $Visiteurs
 *
 * @method \App\Model\Entity\Pret get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pret newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pret[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pret|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pret saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pret patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pret[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pret findOrCreate($search, callable $callback = null, $options = [])
 */
class PretsTable extends Table
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

        $this->setTable('prets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Givers', [ 
            'className' => 'Visiteurs', 
            'foreignKey' => 'donneur_id', 
            'propertyName' => 'Giver']);

        $this->belongsTo('Receivers', [ 
           'className' => 'Visiteurs',                      
           'foreignKey' => 'receveur_id', 
           'propertyName' => 'Receiver']);

        $this->belongsTo('Outils', [
            'foreignKey' => 'outil_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('StatusPrets', [
            'foreignKey' => 'status',
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
            ->dateTime('debut')
            ->requirePresence('debut', 'create')
            ->notEmptyDateTime('debut');

        $validator
            ->dateTime('fin')
            ->requirePresence('fin', 'create')
            ->notEmptyDateTime('fin');

        $validator
            ->integer('status')
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn(['donneur_id'], 'Givers'));
        $rules->add($rules->existsIn(['receveur_id'], 'Receivers'));

        return $rules;
    }
}
