<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResumesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResumesTable Test Case
 */
class ResumesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResumesTable
     */
    public $Resumes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.resumes',
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
        'app.researchs',
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
        $config = TableRegistry::exists('Resumes') ? [] : ['className' => ResumesTable::class];
        $this->Resumes = TableRegistry::get('Resumes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Resumes);

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
