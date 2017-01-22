<?php
session_start();
if(!isset($_SESSION['user']))
{
header("Location: /IAB/");
exit;
}
?>

<br/>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('Stare',  ['type' => 'password']);
            echo $this->Form->input('Nowe', ['type' => 'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zmień hasło')) ?>
    <?= $this->Form->end() ?>
</div>
