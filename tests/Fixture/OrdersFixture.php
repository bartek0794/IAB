<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 *
 */
class OrdersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idOrder' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'idUser' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idPayment' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idDelivery' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_polish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'value' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'idPayment' => ['type' => 'index', 'columns' => ['idPayment'], 'length' => []],
            'idDelivery' => ['type' => 'index', 'columns' => ['idDelivery'], 'length' => []],
            'idUser' => ['type' => 'index', 'columns' => ['idUser'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idOrder'], 'length' => []],
            'orders_ibfk_2' => ['type' => 'foreign', 'columns' => ['idDelivery'], 'references' => ['delivery', 'idDelivery'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'orders_ibfk_3' => ['type' => 'foreign', 'columns' => ['idPayment'], 'references' => ['payments', 'idPayment'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'orders_ibfk_4' => ['type' => 'foreign', 'columns' => ['idUser'], 'references' => ['users', 'idUser'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_polish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'idOrder' => 1,
            'idUser' => 1,
            'idPayment' => 1,
            'idDelivery' => 1,
            'date' => '2017-01-07',
            'status' => 'Lorem ipsum dolor sit amet',
            'value' => 1.5
        ],
    ];
}
