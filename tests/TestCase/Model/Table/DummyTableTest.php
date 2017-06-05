<?php
namespace Cakephp3Bulker\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cakephp3Bulker\Model\Table\DummyTable;

/**
 * Cakephp3Bulker\Model\Table\DummyTable Test Case
 */
class DummyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Cakephp3Bulker\Model\Table\DummyTable
     */
    public $Dummy;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cakephp3_bulker.dummy'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dummy') ? [] : ['className' => 'Cakephp3Bulker\Model\Table\DummyTable'];
        $this->Dummy = TableRegistry::get('Dummy', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dummy);

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
}
