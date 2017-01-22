<br/>
<br/>
<?php
session_start();
if(!isset($_SESSION['user']))
{
header("Location: /IAB/");
exit;
}
?>

<div class="contact form large-9 medium-8 columns content">
    <?= $this->Form->create($contact) ?>
    <fieldset>
        <legend><?= __('Edit Contact') ?></legend>
        <?php
            echo $this->Form->input('idUser');
            echo $this->Form->input('city');
            echo $this->Form->input('zipcode');
            echo $this->Form->input('street');
            echo $this->Form->input('phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
