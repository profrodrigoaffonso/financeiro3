<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormPaymentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormPaymentsTable Test Case
 */
class FormPaymentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FormPaymentsTable
     */
    protected $FormPayments;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FormPayments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FormPayments') ? [] : ['className' => FormPaymentsTable::class];
        $this->FormPayments = $this->getTableLocator()->get('FormPayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FormPayments);

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
}
