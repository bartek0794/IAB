<br/>
<div class="row">
<div class="col-xs-3"></div>
		<div class="col-md-6 col-sm-6 col-xs-12">
		
		<h2 >Rejestracja</h2>
		
   <?= $this->Form->create($user) ?>

      
        <?php
  		echo $this->Form->input('Email', ['name' => 'email','type' => 'email', 'class' => 'form-control']);
		echo $this->Form->input('Hasło', ['name' => 'password', 'type' => 'password', 'class' => 'form-control']);
        ?>
<br/>
    <?=  $this->Form->submit('Zarejestruj się', ['class' => 'btn btn-primar']); ?>
    <?= $this->Form->end() ?>

</div>
<div class="col-xs-3"></div>
</div>