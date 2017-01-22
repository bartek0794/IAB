<br/>
<div class="container">
<div class="row">
<div class="col-xs-3"></div>
		<div class="col-md-6 col-sm-6 col-xs-12">
		
		<h2 >Logowanie</h2>
		
   <?= $this->Form->create('',['id'=>'login-form']) ?>

      
        <?php
		echo $this->Form->input('email', ['class'=>'form-control', 'name'=>'user_email', 'id'=>'user_email']);
		echo $this->Form->input('password', ['class'=>'form-control', 'name'=>'password', 'id'=>'password']);	
        ?>
<br/>
    <?=  $this->Form->submit('login', ['class'=>'btn btn-default', 'name'=>'btn-login', 'id'=>'btn-login']); ?>
    <?= $this->Form->end() ?>
      <div id="error"></div>
  
</div>
<div class="col-xs-3"></div>
</div>
</div>
