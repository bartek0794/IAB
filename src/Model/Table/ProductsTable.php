<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * Products Model
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null)
 */
class ProductsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('products');
        $this->displayField('idProduct');
        $this->primaryKey('idProduct');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idProduct')
            ->allowEmpty('idProduct', 'create');

        $validator
            ->requirePresence('nameProduct', 'create')
            ->notEmpty('nameProduct');

        $validator
            ->decimal('priceProduct')
            ->requirePresence('priceProduct', 'create')
            ->notEmpty('priceProduct');

        $validator
            ->requirePresence('descriptionProduct', 'create')
            ->notEmpty('descriptionProduct');
	$validator
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        $validator
            ->integer('idSubcategory')
            ->requirePresence('idSubcategory', 'create')
            ->notEmpty('idSubcategory');

        return $validator;
    }
}
