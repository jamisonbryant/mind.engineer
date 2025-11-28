<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmailSubscriptions Model
 *
 * @method \App\Model\Entity\EmailSubscription newEmptyEntity()
 * @method \App\Model\Entity\EmailSubscription newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\EmailSubscription> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmailSubscription get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\EmailSubscription findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\EmailSubscription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\EmailSubscription> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmailSubscription|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\EmailSubscription saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\EmailSubscription>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmailSubscription>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EmailSubscription>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmailSubscription> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EmailSubscription>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmailSubscription>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EmailSubscription>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmailSubscription> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmailSubscriptionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('email_subscriptions');
        $this->setDisplayField('email');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }
}
