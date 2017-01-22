<?php 

session_start();
if(!isset($_SESSION['user']))
{
header("Location: /IAB/");
exit;
}

$i=0;
?>
<br/>
<div class="container">
<h3><?= __('Zamówienia') ?></h3>
<div class="row centerDiv">
<div class="col-xs-3">Numer zamówienia</div>
<div class="col-xs-3">Wartośc zamówienia</div>
<div class="col-xs-3">Status zamówienia</div>
<div class="col-xs-3">Data zamówienia</div>
</div>
	<?php foreach ($orders as $order): 
		if($order->idUser == $_SESSION['user']['id']) {
                
			echo '<div class="row centerDiv">
			<div class="col-xs-3">'.$this->Html->link(($order->idOrder), ['action' => 'view', $order->idOrder]).'</div>
			<div class="col-xs-3">'.$order->value.'</div>
			<div class="col-xs-3">'.$order->status.'</div>
			<div class="col-xs-3">'.$order->date.'</div>
			</div>';
                
			$i = 1;
		} 
            endforeach;
            if($i == 0) {
		echo "Nie masz żadnych zamówień";
            }
            ?>
</div>
