<?php use Cake\Datasource\ConnectionManager;?>
<!--
    <h3><?= h($subcategory->nameSubcategory) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('NameSubcategory') ?></th>
            <td><?= h($subcategory->nameSubcategory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdSubcategory') ?></th>
            <td><?= $this->Number->format($subcategory->idSubcategory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdCategory') ?></th>
            <td><?= $this->Number->format($subcategory->idCategory) ?></td>
        </tr>
    </table>
-->
<div class="subcategories view large-9 medium-8 columns content">
    <?php
		$connection = ConnectionManager::get('default');
		$resultsCategories = $connection->execute('SELECT * FROM products WHERE products.idSubcategory ="'.$subcategory->idSubcategory.'"');
	
	
		foreach($resultsCategories as $row): 
			echo '<br/>';
			echo '<br/> <b>Nazwa produktu:</b> ';
			echo $this->Html->link($row['nameProduct'], ['controller' => 'products', 'action' => 'view', $row['idProduct']]);
			echo '<br/> <b>Cena produktu: </b>';
			echo $row['priceProduct'];
			echo '<br/>';
			echo $this->Html->image($row['image'], array('alt' => $row['nameProduct']));
			
		endforeach;
	?>
</div>
