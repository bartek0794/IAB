<?php 

session_start();
if(!isset($_SESSION['user']))
{
header("Location: /IAB/");
exit;
}

use Cake\Datasource\ConnectionManager;

?>
<br/>

<div class="carts index large-9 medium-8 columns content">
    <h3><?= __('Carts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idProduct') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priceOne') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
		
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carts as $cart): 
            if($cart->idUser == $_SESSION['user']['id']){?>
            <tr>
                <?php
			$connection = ConnectionManager::get('default');
			$product = $connection->execute("SELECT nameProduct FROM products WHERE idProduct='".$cart->idProduct."'")->fetchAll(); 
			echo '<td>';
			echo $product[0][0];
			echo '</td>';
		?>
                <td><?= $this->Number->format($cart->priceOne) ?></td>
                <td><?= $this->Number->format($cart->quantity) ?></td>
                <td><?= $this->Number->format($cart->value) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cart->idCart], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->idCart)]) ?>
                </td>
            </tr>
            <?php }?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
