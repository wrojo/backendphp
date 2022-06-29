<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $names
 * @property string $surnames
 * @property string $email
 * @property string $password
 * @property bool $is_active
 * @property bool $is_reset_password
 * @property int $role_id
 * @property int $created_id
 * @property string $created_ip
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $modified_id
 * @property string $modified_ip
 * @property \Cake\I18n\FrozenTime $modified_date
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Created $created
 * @property \App\Model\Entity\Modified $modified
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'names' => true,
        'surnames' => true,
        'email' => true,
        'password' => true,
        'is_active' => true,
        'is_reset_password' => true,
        'role_id' => true,
        'created_id' => true,
        'created_ip' => true,
        'created_date' => true,
        'modified_id' => true,
        'modified_ip' => true,
        'modified_date' => true,
        'role' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
