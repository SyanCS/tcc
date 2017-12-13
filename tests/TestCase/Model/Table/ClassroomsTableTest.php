<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassroomsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassroomsTable Test Case
 */
class ClassroomsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassroomsTable
     */
    public $Classrooms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.classrooms',
        'app.users',
        'app.users_types',
        'app.academic_degrees',
        'app.advisors',
        'app.awards',
        'app.main_infos',
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
        $config = TableRegistry::exists('Classrooms') ? [] : ['className' => ClassroomsTable::class];
        $this->Classrooms = TableRegistry::get('Classrooms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Classrooms);

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
