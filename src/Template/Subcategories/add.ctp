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
        <li><?= $this->Html->link(__('List Subcategories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="subcategories form large-9 medium-8 columns content">
    <?= $this->Form->create($subcategory) ?>
    <fieldset>
        <legend><?= __('Add Subcategory') ?></legend>
        <?php
            echo $this->Form->input('idCategory');
            echo $this->Form->input('nameSubcategory');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
