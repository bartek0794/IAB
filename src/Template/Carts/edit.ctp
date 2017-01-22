<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cart->idCart],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cart->idCart)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Carts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="carts form large-9 medium-8 columns content">
    <?= $this->Form->create($cart) ?>
    <fieldset>
        <legend><?= __('Edit Cart') ?></legend>
        <?php
            echo $this->Form->input('idProduct');
            echo $this->Form->input('priceOne');
            echo $this->Form->input('quantity');
            echo $this->Form->input('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
