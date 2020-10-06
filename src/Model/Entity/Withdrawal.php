<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Withdrawal Entity
 *
 * @property int $id
 * @property int|null $bank_id
 * @property string|null $value
 * @property \Cake\I18n\FrozenTime|null $date_time
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Bank $bank
 */
class Withdrawal extends Entity
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
        'bank_id' => true,
        'value' => true,
        'date_time' => true,
        'created' => true,
        'modified' => true,
        'bank' => true,
    ];
}
