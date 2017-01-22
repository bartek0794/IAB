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
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idProduct') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nameProduct') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priceProduct') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idSubcategory') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->idProduct) ?></td>
                <td><?= h($product->nameProduct) ?></td>
                <td><?= $this->Number->format($product->priceProduct) ?></td>
                <td><?= $this->Number->format($product->idSubcategory) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->idProduct]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->idProduct]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->idProduct], ['confirm' => __('Are you sure you want to delete # {0}?', $product->idProduct)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
