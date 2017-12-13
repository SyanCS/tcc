<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MainInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MainInfosTable Test Case
 */
class MainInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MainInfosTable
     */
    public $MainInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.main_infos',
        'app.users',
        'app.users_types',
        'app.academic_degrees',
        'app.advisors',
        'app.awards',
        'app.classrooms',
        'app.profitional_positions',
        'app.publications',
        'app.researchs',
        'app.resumes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MainInfos') ? [] : ['className' => MainInfosTable::class];
        $this->MainInfos = TableRegistry::get('MainInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MainInfos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
