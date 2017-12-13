<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResearchsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResearchsTable Test Case
 */
class ResearchsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResearchsTable
     */
    public $Researchs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.researchs',
        'app.users',
        'app.users_types',
        'app.academic_degrees',
        'app.advisors',
        'app.awards',
        'app.classrooms',
        'app.main_infos',
        'app.profitional_positions',
        'app.publications',
        'app.publication_participants',
        'app.resumes',
        'app.research_members'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Researchs') ? [] : ['className' => ResearchsTable::class];
        $this->Researchs = TableRegistry::get('Researchs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Researchs);

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
