<?php
session_start();
//session_destroy();
echo $this->Form->create('Cart',array('url'=>array('action'=>'update')));?>
<br/>
<div class="row">
    <div class="col-lg-12">
<?php if(isset($_SESSION['koszyk'])) {?>
    <table class="table">
            <thead>
                <tr>
		    <th></th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $total=0; ?>
                
                <?php foreach($_SESSION['koszyk'] as $product):?>
                <tr>
			<?php $count = $product['count']; ?>
			<td><div class="col-lg-3 col-md-3">
			<?php echo $this->Html->image($product['image'],array('class'=>'thumbnail', 'width'=>'100px', 'height'=>'100px'));?>
			</div></td>
                    <td><?php echo $product['nameProduct'];?></td>
                    <td><?php echo $this->Number->format($product['priceProduct'], ['places'=>'2']);?> zł
                    </td>
                    <td><div class="col-xs-3">
                            <?php echo $this->Form->hidden('product_id.',array('value'=>$product['idProduct']));?>
                            <?php echo $this->Form->input('count.',array('type'=>'number', 'label'=>false,
                                    'class'=>'form-control input-sm', 'value'=>$product['count']));?>
                        </div></td>
                    <td><?php echo $this->Number->format($count*$product['priceProduct'], ['places'=>'2']); ?> zł
                    
                    </td>
                    <td><?php  echo $this->Html->link('Usuń', ['controller' => 'Carts', 'action' => 'delete', $product['idProduct']], ['class'=>'btn-danger btn btn-sm']);?>
                    
                    </td>
                </tr>
                <?php $total = $total + ($product['count']*$product['priceProduct']);
                
		if(isset($_SESSION['countProducts'])){
			$_SESSION['countProducts'] = 0;
			foreach($_SESSION['koszyk'] as $product):
				$_SESSION['countProducts'] += $product['count'];
			endforeach;
		}
                ?>
                <?php endforeach; 
                	

                ?>
                <tr class="success">
                    <td></td>
                    <td>Do zapłaty: </td>
                    <td><?php echo $this->Number->format($total, ['places'=>'2']), ' zł';
                    
	foreach($_SESSION['koszyk'] as $product => $k):
		echo $product['idProduct'];
	endforeach;?>
                    </td>
                </tr>
            </tbody>
        </table>
 
        <p class="text-right">
            <?php echo $this->Form->submit('Przelicz',array('class'=>'btn btn-warning','div'=>false));
            echo $this->Html->link('Złóż zamówienie', ['controller' => 'Orders', 'action' => 'add'], ['class'=>'btn-success btn btn-sm']);
            echo '<br/>';
            echo $this->Html->link('Zapisz koszyk', ['controller' => 'Carts', 'action' => 'add'], ['class'=>'btn-success btn btn-sm']);
	?>
        </p>
 <?php }
	else
		echo "<br/>Nie ma nic w koszyku";
?>
    </div>
</div>
<?php echo $this->Form->end();?>