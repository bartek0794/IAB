<?php 
use Cake\Datasource\ConnectionManager;

$connection = ConnectionManager::get('default');
$delivery = $connection->execute('SELECT * FROM delivery WHERE idDelivery="'.$order->idDelivery.'"')->fetchAll();
$payment = $connection->execute('SELECT * FROM payments WHERE idPayment="'.$order->idPayment.'"')->fetchAll();
$products = $connection->execute('SELECT * FROM orderProducts WHERE idOrder="'.$order->idOrder.'"')->fetchAll();
?>
<br/>
<br/>	
<div class="orders view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Payment ') ?></th>
            <td><?= $payment[0][1] ?></td>
            <td><?= $payment[0][2]." zł" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery ') ?></th>
            <td><?= $delivery[0][1] ?></td>
            <td><?= $delivery[0][2]." zł" ?></td>
        </tr>
        
    </table>
</div>

<div>
<?php 
foreach($products as $row):
	$product = $connection->execute('SELECT * FROM products WHERE idProduct="'.$row[1].'"')->fetchAll();
	echo 'Nazwa produktu '.$product[0][1].'<br/>';
	echo 'Ilość produktów '.$row[2].'<br/>';
	echo 'Cena produktu '.$row[3].'<br/>';
	echo '<br/>';
endforeach;

?>
</div>
