<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ForumContent Model
 *
 * @method \App\Model\Entity\ForumContent newEmptyEntity()
 * @method \App\Model\Entity\ForumContent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ForumContent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ForumContent get($primaryKey, $options = [])
 * @method \App\Model\Entity\ForumContent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ForumContent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ForumContent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ForumContent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ForumContent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ForumContent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ForumContent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ForumContent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ForumContent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ForumContentTable extends Table
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

        $this->setTable('forum_content');
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
            ->scalar('title1')
            ->maxLength('title1', 450)
            ->allowEmptyString('title1');

        $validator
            ->scalar('paragraph1')
            ->maxLength('paragraph1', 4500)
            ->allowEmptyString('paragraph1');

        return $validator;
    }
}
