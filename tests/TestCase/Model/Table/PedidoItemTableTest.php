<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidoItemTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidoItemTable Test Case
 */
class PedidoItemTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidoItemTable
     */
    public $PedidoItem;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PedidoItem',
        'app.Pedidos',
        'app.Produtos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PedidoItem') ? [] : ['className' => PedidoItemTable::class];
        $this->PedidoItem = TableRegistry::getTableLocator()->get('PedidoItem', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PedidoItem);

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
