<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdutoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdutoTable Test Case
 */
class ProdutoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdutoTable
     */
    public $Produto;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Produto',
        'app.PedidoItem',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Produto') ? [] : ['className' => ProdutoTable::class];
        $this->Produto = TableRegistry::getTableLocator()->get('Produto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Produto);

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
