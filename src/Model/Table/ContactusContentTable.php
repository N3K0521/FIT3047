<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContactusContent Model
 *
 * @method \App\Model\Entity\ContactusContent newEmptyEntity()
 * @method \App\Model\Entity\ContactusContent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ContactusContent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContactusContent get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContactusContent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ContactusContent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContactusContent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContactusContent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContactusContent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContactusContent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContactusContent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContactusContent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContactusContent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContactusContentTable extends Table
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

        $this->setTable('contactus_content');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmptyString('phone');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('opening hours')
            ->maxLength('opening hours', 4294967295)
            ->allowEmptyString('openinghours');

        return $validator;
    }
}
