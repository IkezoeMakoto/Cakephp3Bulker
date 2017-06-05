<?php
namespace Cakephp3Bulker\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dummy Model
 *
 * @method \Cakephp3Bulker\Model\Entity\Dummy get($primaryKey, $options = [])
 * @method \Cakephp3Bulker\Model\Entity\Dummy newEntity($data = null, array $options = [])
 * @method \Cakephp3Bulker\Model\Entity\Dummy[] newEntities(array $data, array $options = [])
 * @method \Cakephp3Bulker\Model\Entity\Dummy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Cakephp3Bulker\Model\Entity\Dummy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Cakephp3Bulker\Model\Entity\Dummy[] patchEntities($entities, array $data, array $options = [])
 * @method \Cakephp3Bulker\Model\Entity\Dummy findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DummyTable extends Table
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

        $this->setTable('dummy');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
