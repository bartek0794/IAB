<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contact'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contact index large-9 medium-8 columns content">
    <h3><?= __('Contact') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idContact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idUser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zipcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('street') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contact as $contact): ?>
            <tr>
                <td><?= $this->Number->format($contact->idContact) ?></td>
                <td><?= $this->Number->format($contact->idUser) ?></td>
                <td><?= h($contact->city) ?></td>
                <td><?= h($contact->zipcode) ?></td>
                <td><?= h($contact->street) ?></td>
                <td><?= h($contact->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contact->idContact]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->idContact]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contact->idContact], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->idContact)]) ?>
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
