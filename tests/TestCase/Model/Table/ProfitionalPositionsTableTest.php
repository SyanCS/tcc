<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfitionalPositionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfitionalPositionsTable Test Case
 */
class ProfitionalPositionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfitionalPositionsTable
     */
    public $ProfitionalPositions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.profitional_positions',
        'app.users',
        'app.users_types',
        'app.academic_degrees',
        'app.advisors',
        'app.awards',
        'app.classrooms',
        'app.main_infos',
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
        $config = TableRegistry::exists('ProfitionalPositions') ? [] : ['className' => ProfitionalPositionsTable::class];
        $this->ProfitionalPositions = TableRegistry::get('ProfitionalPositions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProfitionalPositions);

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
