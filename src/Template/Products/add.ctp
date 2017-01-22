<?php
session_start();
if(!isset($_SESSION['admin']))
{
header("Location: /IAB/");
exit;
}
?>
<br/>
<br/>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->input('nameProduct');
            echo $this->Form->input('priceProduct');
            echo $this->Form->input('descriptionProduct');
            echo $this->Form->input('image');
            echo $this->Form->input('idSubcategory');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
