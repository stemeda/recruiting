<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Candidates
 * @property \Cake\ORM\Association\HasMany $OpenRegistrations
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Search.Search');


        $this->hasOne('OpenRegistrations', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasOne('Candidates', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);

        // Setup search filter using search manager
        $this->searchManager()
                // Here we will alias the 'q' query param to search the `Articles.title`
                // field and the `Articles.content` field, using a LIKE match, with `%`
                // both before and after.
                ->add('username', 'Search.Like', [
                    'before' => true,
                    'after' => true,
                    'comparison' => 'LIKE',
                    'field' => ['username'],
                    'filterEmpty' => true
                ])
                ->add('firstname', 'Search.Like', [
                    'before' => true,
                    'after' => true,
                    'comparison' => 'LIKE',
                    'field' => ['firstname'],
                    'filterEmpty' => true
                ])
                ->add('surname', 'Search.Like', [
                    'before' => true,
                    'after' => true,
                    'comparison' => 'LIKE',
                    'field' => ['surname'],
                    'filterEmpty' => true
                ])
                ->add('active', 'Search.Boolean', [
                    'field' => 'active',
                    'filterEmpty' => true
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->requirePresence('surname', 'create')
            ->notEmpty('surname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->boolean('renew_passwort')
            ->allowEmpty('renew_passwort');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');


        $validator->add('password', [
            'compare' => [
                'rule' => ['compareWith', 'password_check'],
                'message' => 'Passwords do not match'
            ]
        ]);

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    /**
     * Finder for users in backend
     * @param Query $query query of the finder
     * @param array $options options for the finder
     * @return Query
     */
    public function findBackend(Query $query, array $options)
    {
        $query->where(['Users.active' => 1, 'Users.type IN ' => ['admin', 'recruiter']]);

        return $query;
    }

    /**
     * Finder for users in frontend
     * @param Query $query query of the finder
     * @param array $options options for the finder
     * @return Query
     */
    public function findFrontend(Query $query, array $options)
    {
        $query->where(['Users.active' => 1, 'Users.type IN ' => ['candidate']])
            ->contain(['Candidates']);

        return $query;
    }

    /**
     * active a user after the registrations. The recistration will be delted
     * and the user will be set to active
     *
     * @param User $user the entity of the user that should be activated
     * @return bool
     */
    public function activateAfterRegistration(User $user)
    {
        $user->active = true;
        $this->OpenRegistrations->delete($user->open_registration);

        return $this->save($user);
    }
}
