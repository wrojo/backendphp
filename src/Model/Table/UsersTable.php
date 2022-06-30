<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\CreatedsTable&\Cake\ORM\Association\BelongsTo $Createds
 * @property \App\Model\Table\ModifiedsTable&\Cake\ORM\Association\BelongsTo $Modifieds
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
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
        
        $messageVacio = __('Este campo es requerido.');
        $messagePasswordRango = 'La clave debe tener entre {0} y {1} carácteres.';
        $messageMaxRango = 'Este campo no debe superar los {0} carácteres.';
        $messageCorreo = __('Debe ingresar un correo válido.');
        $messageNumero = __('El campo debe ser númerico.');
        $messageEmailUnico = __('El email ingresado ya existe.');
        $messageEmailValido = __('El email ingresado no es válido.');
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create',$messageVacio);

        $validator
            ->notEmptyString('role_id',$messageVacio);

        $validator
            ->scalar('names',$messageVacio)
            ->maxLength('names', 255,__($messageMaxRango,255))
            ->requirePresence('names',$messageVacio)
            ->notEmptyString('names',$messageVacio);

        $validator
            ->scalar('surnames',$messageVacio)
            ->maxLength('surnames', 255,__($messageMaxRango,255))
            ->requirePresence('surnames',$messageVacio)
            ->notEmptyString('surnames',$messageVacio);

        $validator
            ->requirePresence('email',$messageVacio)
            ->notEmptyString('email',$messageVacio)
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message'=>$messageEmailUnico])
            ->add('email','validFormat',[
                'rule' => 'email',
                'message' => $messageEmailValido,
            ]);

        $validator
            ->notEmptyString('password',$messageVacio,'create')
            ->maxLength('password', 10,__($messagePasswordRango,4,10))
            ->minLength('password',4 ,__($messagePasswordRango,4,10));
           
        $validator->requirePresence([
            'password' => [
                'mode' => 'create',
                'message' => $messageVacio,
            ]
        ]);
 
        $validator
            ->boolean('is_active')
            ->notEmptyString('is_active');

        $validator
            ->boolean('is_reset_password')
            ->notEmptyString('is_reset_password');

        $validator
            ->scalar('created_ip')
            ->maxLength('created_ip', 40)
            ->requirePresence('created_ip', 'create')
            ->notEmptyString('created_ip');

        $validator
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmptyDateTime('created_date');

        $validator
            ->scalar('modified_ip')
            ->maxLength('modified_ip', 40)
            ->requirePresence('modified_ip', 'create')
            ->notEmptyString('modified_ip');

        $validator
            ->dateTime('modified_date')
            ->requirePresence('modified_date', 'create')
            ->notEmptyDateTime('modified_date');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        return $rules;
    }
    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->contain(['Roles'])
            ->where(['Users.is_active' => 1]);

        return $query;
    }
}
