<br/><br/>
<div class="orders form large-9 medium-8 columns content">
<?php
use Cake\Datasource\ConnectionManager;
$i = 0;
$connection = ConnectionManager::get('default');
$payment = $connection->execute('SELECT * FROM payments')->fetchAll();
foreach($payment as $row):
$pay[$i] = $row[1]." ".$row[2]." zł";
$i = $i + 1;
endforeach;

$i = 0;
$delivery = $connection->execute('SELECT * FROM delivery')->fetchAll();
foreach($delivery as $row):
$send[$i] = $row[1]." ".$row[2]." zł";
$i = $i + 1;
endforeach;


if(!isset($_SESSION)){
session_start();
}
$total = 0;
foreach($_SESSION['koszyk'] as $product):?>
		<div class="row">
		<div class="col-sm-3">
			<?php echo $this->Html->image($product['image'],array('class'=>'thumbnail', 'width'=>'60px', 'height'=>'60px'));?>
		</div>
		<div class="col-sm-3">
			<?php echo $product['nameProduct'];?>
		</div>
		<div class="col-sm-3">
			<?php echo $this->Form->label('count.',['value'=>$product['count']]);?>
		</div>
		<div class="col-sm-3">
			<?php echo $this->Number->format($product['count']*$product['priceProduct'], ['places'=>'2']); ?> zł</td>
                </div>
                </div>
                <?php $total = $total + ($product['count']*$product['priceProduct']);
                endforeach;
                echo '<h3>Do zapłaty: '.$this->Number->format($total).' zł</h3><br/>';?>
    
    <?= $this->Form->create($order) ?>
    <fieldset>
        <?php
		$results = $connection->execute('SELECT * FROM contact WHERE idUser="'.$_SESSION['user']['id'].'"')->fetchAll();
		if(count($results)>0) {
			echo '<h3>Adres wysłki</h3>';
			echo '<table class="vertical-table">
			<tr>
				<th scope="row">Miasto</th>
				<td>'.$results[0][2].'</td>
			</tr>
			<tr>
				<th scope="row">Kod pocztowy</th>
				<td>'.$results[0][3].'</td>
			</tr>
			<tr>
				<th scope="row">Ulica</th>
				<td>'.$results[0][4].'</td>
			</tr>
			<tr>
				<th scope="row">Numer telefonu</th>
				<td>'.$results[0][5].'</td>
			</tr>
			</table>';
			
			echo $this->Form->hidden('idUser',['value'=>$_SESSION['user']['id']]);
			echo $this->Form->input('idPayment', array('type'=>'select','options'=>$pay));
			echo $this->Form->input('idDelivery', array('type'=>'select','options'=>$send));            
			echo $this->Form->hidden('date', ['value'=>date("y.m.d")]);
			echo $this->Form->hidden('status', ['value'=>'przyjęte do realizacji']);
			echo $this->Form->hidden('value', ['value'=>$total]);
			echo $this->Form->button(__('Zatwierdź'));
			echo $this->Form->end();
		}
		else {
			echo 'Uzupełnij dane adresowe aby dokonać zamówienia';
		}
	?>
        
</div>