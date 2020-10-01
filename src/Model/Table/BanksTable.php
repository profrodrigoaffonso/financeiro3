<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Banks Model
 *
 * @method \App\Model\Entity\Bank newEmptyEntity()
 * @method \App\Model\Entity\Bank newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Bank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bank get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bank findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Bank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bank[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bank|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bank saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bank[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bank[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bank[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bank[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BanksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('banks');
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
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 3)
            ->allowEmptyString('code');

        $validator
            ->scalar('agency')
            ->maxLength('agency', 6)
            ->allowEmptyString('agency');

        $validator
            ->scalar('account')
            ->maxLength('account', 20)
            ->allowEmptyString('account');

        $validator
            ->boolean('account_holder')
            ->allowEmptyString('account_holder');

        return $validator;
    }
}
