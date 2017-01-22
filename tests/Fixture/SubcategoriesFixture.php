<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubcategoriesFixture
 *
 */
class SubcategoriesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idSubcategory' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idCategory' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nameSubcategory' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_polish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'idCategory' => ['type' => 'index', 'columns' => ['idCategory'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idSubcategory'], 'length' => []],
            'subcategories_ibfk_1' => ['type' => 'foreign', 'columns' => ['idCategory'], 'references' => ['categories', 'idCategory'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'idSubcategory' => 1,
            'idCategory' => 1,
            'nameSubcategory' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
