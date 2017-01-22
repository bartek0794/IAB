<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subcategories Model
 *
 * @method \App\Model\Entity\Subcategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subcategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subcategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subcategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subcategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subcategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subcategory findOrCreate($search, callable $callback = null)
 */
class SubcategoriesTable extends Table
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

        $this->table('subcategories');
        $this->displayField('idSubcategory');
        $this->primaryKey('idSubcategory');
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
            ->integer('idSubcategory')
            ->allowEmpty('idSubcategory', 'create');

        $validator
            ->integer('idCategory')
            ->requirePresence('idCategory', 'create')
            ->notEmpty('idCategory');

        $validator
            ->requirePresence('nameSubcategory', 'create')
            ->notEmpty('nameSubcategory');

        return $validator;
    }
}
