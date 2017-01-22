<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->idContact]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->idContact], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->idContact)]) ?> </li>
        <li><?= $this->Html->link(__('List Contact'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contact view large-9 medium-8 columns content">
    <h3><?= h($contact->idContact) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($contact->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zipcode') ?></th>
            <td><?= h($contact->zipcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Street') ?></th>
            <td><?= h($contact->street) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($contact->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdContact') ?></th>
            <td><?= $this->Number->format($contact->idContact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdUser') ?></th>
            <td><?= $this->Number->format($contact->idUser) ?></td>
        </tr>
    </table>
</div>
