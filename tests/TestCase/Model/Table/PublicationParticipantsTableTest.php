<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublicationParticipantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublicationParticipantsTable Test Case
 */
class PublicationParticipantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PublicationParticipantsTable
     */
    public $PublicationParticipants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.publication_participants',
        'app.publications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PublicationParticipants') ? [] : ['className' => PublicationParticipantsTable::class];
        $this->PublicationParticipants = TableRegistry::get('PublicationParticipants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PublicationParticipants);

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
