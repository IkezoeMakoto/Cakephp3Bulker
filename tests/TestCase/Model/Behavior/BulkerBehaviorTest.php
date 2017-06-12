<?php
namespace Cakephp3Bulker\Test\TestCase\Model\Behavior;

use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
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

        $this->Dummy = TableRegistry::get('Dummy', ['className' => 'Cakephp3Bulker\Model\Table\DummyTable']);
        if ($this->Dummy->hasBehavior('Bulker')) {
            $this->Dummy->removeBehavior('Bulker');
        }
        $this->Dummy->addBehavior('Cakephp3Bulker.Bulker');
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
     * @test
     *
     * @return void
     */
    public function saveBulk_insertSuccess()
    {
        $result = $this->Dummy->saveBulk(
            [
                ['name' => 'hoge', 'created' => Time::now(), 'modified' => Time::now()],
                ['name' => 'huga', 'created' => Time::now(), 'modified' => Time::now()]
            ]
        );
        $this->assertSame(2, $result);
    }

    /**
     * @test
     *
     * @return void
     */
    public function saveBulk_updateSuccess()
    {
        $this->Dummy->saveBulk(
            [
                ['name' => 'hoge', 'created' => Time::now(), 'modified' => Time::now()],
                ['name' => 'huga', 'created' => Time::now(), 'modified' => Time::now()]
            ]
        );

        $this->Dummy->saveBulk(
            [
                ['id' => 1, 'name' => 'hogeUpdate', 'created' => Time::now(), 'modified' => Time::now()],
                ['id' => 2, 'name' => 'hugaUpdate', 'created' => Time::now(), 'modified' => Time::now()]
            ]
        );
        $result = $this->Dummy->find()->all()->toArray();

        $this->assertSame('hogeUpdate', $result[0]['name']);
        $this->assertSame('hugaUpdate', $result[1]['name']);
    }

    /**
     * @test
     *
     * @return void
     */
    public function saveBulk_failuerValidate()
    {
        $result = $this->Dummy->saveBulk(
            [
                ['name' => 'hoge', 'modified' => Time::now()],
                ['name' => 'huga', 'modified' => Time::now()]
            ]
        );

        $this->assertFalse($result);
    }
}
