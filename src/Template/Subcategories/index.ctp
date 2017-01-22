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
        <li><?= $this->Html->link(__('New Subcategory'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subcategories index large-9 medium-8 columns content">
    <h3><?= __('Subcategories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idSubcategory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idCategory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nameSubcategory') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subcategories as $subcategory): ?>
            <tr>
                <td><?= $this->Number->format($subcategory->idSubcategory) ?></td>
                <td><?= $this->Number->format($subcategory->idCategory) ?></td>
                <td><?= h($subcategory->nameSubcategory) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subcategory->idSubcategory]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subcategory->idSubcategory]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subcategory->idSubcategory], ['confirm' => __('Are you sure you want to delete # {0}?', $subcategory->idSubcategory)]) ?>
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
