<?php
if(!isset($_SESSION['user'])) {
session_start();
}
?>
<br/>
<br/>
<div class="contact form large-9 medium-8 columns content">
    <?= $this->Form->create($contact) ?>
    <fieldset>
        <?php
            echo $this->Form->hidden('idUser',['value'=>$_SESSION['user']['id']]);
            echo $this->Form->input('city');
            echo $this->Form->input('zipcode');
            echo $this->Form->input('street');
            echo $this->Form->input('phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
