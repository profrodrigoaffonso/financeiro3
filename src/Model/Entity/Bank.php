<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bank Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $agency
 * @property string|null $account
 * @property bool|null $account_holder
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Bank extends Entity
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
        'name' => true,
        'code' => true,
        'agency' => true,
        'account' => true,
        'account_holder' => true,
        'created' => true,
        'modified' => true,
    ];
}
