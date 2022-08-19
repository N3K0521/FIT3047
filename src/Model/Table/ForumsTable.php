<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Forums Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CommentsTable&\Cake\ORM\Association\HasMany $Comments
 *
 * @method \App\Model\Entity\Forum newEmptyEntity()
 * @method \App\Model\Entity\Forum newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Forum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Forum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Forum findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Forum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Forum[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Forum|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Forum saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Forum[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Forum[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Forum[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Forum[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ForumsTable extends Table
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

        $this->setTable('forums');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'forum_id',
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
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('content')
            ->maxLength('content', 4500)
            ->allowEmptyString('content');

        $validator
            ->dateTime('postTime')
            ->requirePresence('postTime', 'create')
            ->notEmptyDateTime('postTime');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
