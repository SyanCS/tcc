<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcademicDegreesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcademicDegreesTable Test Case
 */
class AcademicDegreesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AcademicDegreesTable
     */
    public $AcademicDegrees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.academic_degrees',
        'app.users',
        'app.users_types',
        'app.advisors',
        'app.awards',
        'app.classrooms',
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
        $config = TableRegistry::exists('AcademicDegrees') ? [] : ['className' => AcademicDegreesTable::class];
        $this->AcademicDegrees = TableRegistry::get('AcademicDegrees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AcademicDegrees);

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
