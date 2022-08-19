<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HomepageContentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HomepageContentTable Test Case
 */
class HomepageContentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HomepageContentTable
     */
    protected $HomepageContent;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.HomepageContent',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('HomepageContent') ? [] : ['className' => HomepageContentTable::class];
        $this->HomepageContent = $this->getTableLocator()->get('HomepageContent', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->HomepageContent);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HomepageContentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
