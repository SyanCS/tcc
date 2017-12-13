<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublicationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublicationsTable Test Case
 */
class PublicationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PublicationsTable
     */
    public $Publications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.publications',
        'app.users',
        'app.users_types',
        'app.academic_degrees',
        'app.advisors',
        'app.awards',
        'app.classrooms',
        'app.main_infos',
        'app.profitional_positions',
        'app.researchs',
        'app.resumes',
        'app.publication_participants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Publications') ? [] : ['className' => PublicationsTable::class];
        $this->Publications = TableRegistry::get('Publications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Publications);

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
