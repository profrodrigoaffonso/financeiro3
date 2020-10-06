<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Withdrawals Model
 *
 * @property \App\Model\Table\BanksTable&\Cake\ORM\Association\BelongsTo $Banks
 *
 * @method \App\Model\Entity\Withdrawal newEmptyEntity()
 * @method \App\Model\Entity\Withdrawal newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Withdrawal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Withdrawal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Withdrawal findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Withdrawal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Withdrawal[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Withdrawal|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Withdrawal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Withdrawal[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Withdrawal[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Withdrawal[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Withdrawal[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WithdrawalsTable extends Table
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

        $this->setTable('withdrawals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id',
        ]);
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
            ->decimal('value')
            ->allowEmptyString('value');

        $validator
            ->dateTime('date_time')
            ->allowEmptyDateTime('date_time');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['bank_id'], 'Banks'), ['errorField' => 'bank_id']);

        return $rules;
    }
}
