<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactusContentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactusContentTable Test Case
 */
class ContactusContentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactusContentTable
     */
    protected $ContactusContent;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ContactusContent',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ContactusContent') ? [] : ['className' => ContactusContentTable::class];
        $this->ContactusContent = $this->getTableLocator()->get('ContactusContent', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ContactusContent);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContactusContentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
