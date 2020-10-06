<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WithdrawalsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WithdrawalsTable Test Case
 */
class WithdrawalsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WithdrawalsTable
     */
    protected $Withdrawals;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Withdrawals',
        'app.Banks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Withdrawals') ? [] : ['className' => WithdrawalsTable::class];
        $this->Withdrawals = $this->getTableLocator()->get('Withdrawals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Withdrawals);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
