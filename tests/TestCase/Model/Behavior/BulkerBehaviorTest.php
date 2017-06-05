<?php
namespace Cakephp3Bulker\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use Cakephp3Bulker\Model\Behavior\BulkerBehavior;

/**
 * Cakephp3Bulker\Model\Behavior\BulkerBehavior Test Case
 */
class BulkerBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Cakephp3Bulker\Model\Behavior\BulkerBehavior
     */
    public $Bulker;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Bulker = new BulkerBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bulker);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * @test
     *
     * @return void
     */
    public function saveBulk_saveSuccess()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * @test
     *
     * @return void
     */
    public function saveBulk_failuerValidate()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
