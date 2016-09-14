<?php

namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * User Model
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
class UserTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('user');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Search.Search');
        
        
        $this->hasOne('OpenRegistrations', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
    public function validationDefault(Validator $validator) {
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

        $validator->add('password', [
            'compare' => [
                'rule' => ['compareWith', 'password_check'],
                'message' => 'Password do not match'
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
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    public function findBackend(Query $query, array $options) {
        $query->where(['User.active' => 1, 'User.type IN ' => ['admin', 'recruiter']]);

        return $query;
    }

    public function findFrontend(Query $query, array $options) {
        $query->where(['User.active' => 1, 'User.type IN ' => ['candidate']]);

        return $query;
    }
    
    public function activateAfterRegistration(User $user) {
        $user->active = true;
        $this->OpenRegistrations->delete($user->open_registration);
        $this->save($user);
        
    }

}