<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('articles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('slug')
            ->maxLength('slug', 100)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('summary')
            ->requirePresence('summary', 'create')
            ->notEmptyString('summary');

        $validator
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

        $validator
            ->scalar('status')
            ->inList('status', [self::STATUS_DRAFT, self::STATUS_PUBLISHED])
            ->notEmptyString('status');

        $validator
            ->dateTime('published_at')
            ->allowEmptyDateTime('published_at');

        return $validator;
    }

    public function findPublished(): \Cake\ORM\Query\SelectQuery
    {
        return $this->find()
            ->where([
                'status' => self::STATUS_PUBLISHED,
                'published_at <=' => new \DateTime(),
            ])
            ->orderBy(['published_at' => 'DESC']);
    }

    public function findBySlug(string $slug): \Cake\ORM\Query\SelectQuery
    {
        return $this->findPublished()->where(['slug' => $slug]);
    }
}
