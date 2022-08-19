<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HomepageContent Model
 *
 * @method \App\Model\Entity\HomepageContent newEmptyEntity()
 * @method \App\Model\Entity\HomepageContent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\HomepageContent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HomepageContent get($primaryKey, $options = [])
 * @method \App\Model\Entity\HomepageContent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\HomepageContent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HomepageContent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HomepageContent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HomepageContent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HomepageContent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HomepageContent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\HomepageContent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HomepageContent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HomepageContentTable extends Table
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

        $this->setTable('homepage_content');
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

        $validator
            ->scalar('image1')
            ->maxLength('image1', 450)
            ->allowEmptyFile('image1');

        $validator
            ->scalar('title2')
            ->maxLength('title2', 450)
            ->allowEmptyString('title2');

        $validator
            ->scalar('paragraph2')
            ->maxLength('paragraph2', 4500)
            ->allowEmptyString('paragraph2');

        $validator
            ->scalar('image2')
            ->maxLength('image2', 450)
            ->allowEmptyFile('image2');

        $validator
            ->scalar('title3')
            ->maxLength('title3', 450)
            ->allowEmptyString('title3');

        $validator
            ->scalar('paragraph3')
            ->maxLength('paragraph3', 4500)
            ->allowEmptyString('paragraph3');

        $validator
            ->scalar('title4')
            ->maxLength('title4', 450)
            ->allowEmptyString('title4');

        $validator
            ->scalar('paragraph4')
            ->maxLength('paragraph4', 4500)
            ->allowEmptyString('paragraph4');

        $validator
            ->scalar('image3')
            ->maxLength('image3', 450)
            ->allowEmptyFile('image3');

        $validator
            ->scalar('name1')
            ->maxLength('name1', 450)
            ->allowEmptyString('name1');

        $validator
            ->scalar('usertype1')
            ->maxLength('usertype1', 450)
            ->allowEmptyString('usertype1');

        $validator
            ->scalar('userdes')
            ->maxLength('userdes', 4500)
            ->allowEmptyString('userdes');

        return $validator;
    }
}
