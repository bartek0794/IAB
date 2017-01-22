<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->idProduct]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->idProduct], ['confirm' => __('Are you sure you want to delete # {0}?', $product->idProduct)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
-->
<br/>
<br/>
<div class="row">
    <div class="col-lg-4 col-md-4">
        <?php echo $this->Html->image($product->image,array('class'=>'thumbnail'));?>
    </div>
 
    <div class="col-lg-8 col-md-8">
        <h1>
            <?php echo $product->nameProduct;?>
        </h1>
        <h2>
            Cena:
            <?php echo $this->Number->format($product->priceProduct);?>
            zł
        </h2>
	<p>	
		<?php echo $this->Text->autoParagraph(h($product->descriptionProduct)); ?>	
	</p>

        <p>
            <?php echo $this->Html->link('Dodaj do koszyka', ['controller' => 'Products', 'action' => 'addtocart', $product->idProduct], ['class'=>'btn-success btn btn-lg']);?>
           
        </p>
    </div>
</div>