<?php
session_start();

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    
</head>
<body class="home">
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Sklep internetowy</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			<li><a href="#about">O nas</a></li>
			<li><a href="#contact">Kontakt</a></li>
			<?php 
			
			$connection = ConnectionManager::get('default');
			$resultsCategories = $connection->execute('SELECT * FROM categories');
			foreach($resultsCategories as $row): 
				echo '<li class="dropdown">';
				echo $this->Html->link($row['nameCategory'], ['controller' => 'categories', 'action' => 'view',$row['idCategory']], ['class'=>'dropdown-toggle', 'data-toggle'=>'dropdown', 'role'=>'button', 'aria-haspopup'=>'true', 'aria-expanded'=>'false']);
				
				echo '<ul class="dropdown-menu">';
				$resultsSubcategories = $connection->execute('SELECT * FROM subcategories WHERE subcategories.idCategory ="'.$row['idCategory'].'"');
				foreach($resultsSubcategories as $sub):
					echo '<li>';					
					echo $this->Html->link($sub['nameSubcategory'], ['controller' => 'subcategories', 'action' => 'view', $sub['idSubcategory']]);
					echo '</li>';
				endforeach;
				echo '</ul>';
			endforeach;
			?>
		
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php
			    if(!isset($_SESSION['user'])) {
                                echo '<li>';
                                echo $this->Html->link('Zaloguj się', ['controller' => 'users', 'action' => 'login']);
				echo '</li><li>';
                                echo $this->Html->link('Zarejestruj się', ['controller' => 'users', 'action' => 'register']);
				echo '</li>';
                            }
                            else {
                                echo '<li>';
                                echo $this->Html->link('Wyloguj się', ['controller' => 'users', 'action' => 'logout']);
				echo '</li><li>';
                                echo $this->Html->link('Konto', ['controller' => 'users', 'action' => 'view', 'id' => $_SESSION['user']['id']]);
				echo '</li>';
                            }             
			?>
			<li class="active">
			 <?php if(!isset($_SESSION['countProducts'])) echo $this->Html->link('<span class="sr-only">(current)</span>Koszyk  <span class="badge" id="cart-counter">0</span>',array('controller'=>'carts','action'=>'view'),array('escape'=>false));
			else
			echo $this->Html->link('<span class="sr-only">(current)</span>Koszyk  <span class="badge" id="cart-counter">'.$_SESSION['countProducts'].'</span>', array('controller'=>'carts','action'=>'view'),array('escape'=>false)); ?>			
			</li>
		</ul>
	</div>
	</div>
	</nav>
	

	<div class="my-container">
	<div class="row">
            <div class="col-xs-12">
		<div id="carousel-example-generic" class="carousel slide">
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
                                    <img src="img/1.jpg" alt="">
					<!-- <div class="carousel-caption">
					<h3>To jest opis</h3>
					<p>pierwszego slajdu</p>
					</div>-->
				</div>
				<div class="item">
					<img src="img/2.jpg" alt="">
				</div>
					<div class="item">
						<img src="img/3.jpg" alt="">
					</div>
                        </div>
				
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				<span class="icon-prev"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="icon-next"></span>
                        </a>
                    </div>
		</div>
            </div>
            <div class="container-fluid">
		
                    <div class="row" id="about">
                        <div class="col-xs-12 text-center about">
				<h1> O nas </h1>
				<p>		
				tristique. Mauris et malesuada diam, non ornare ante. Fusce eget velit ac lectus gravida elementum quis a arcu. Ut porttitor gravida faucibus. Aenean in porta dui. Aenean vehicula consectetur efficitur. tristique. Mauris et malesuada diam, non ornare ante. Fusce eget velit ac lectus gravida elementum quis a arcu. Ut porttitor gravida faucibus. Aenean in porta dui. Aenean vehicula consectetur efficitur.tristique. Mauris et malesuada diam, non ornare ante. Fusce eget velit ac lectus gravida elementum quis a arcu. Ut porttitor gravida faucibus. Aenean in porta dui. Aenean vehicula consectetur efficitur.tristique. Mauris et malesuada diam, non ornare ante. Fusce eget velit ac lectus gravida elementum quis a arcu. Ut porttitor gravida faucibus. Aenean in porta dui. Aenean vehicula consectetur efficitur.tristique. Mauris et malesuada diam, non ornare ante. Fusce eget velit ac lectus gravida elementum quis a arcu. Ut porttitor gravida faucibus. Aenean in porta dui. Aenean vehicula consectetur efficitur.
				</p>
			</div>				
		</div>
		
		
		<div class="row" id="contact">
			<div class="col-md-12 text-center">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6 text-center">
						<h2>Kontakt</h2>
						
						<?php
							echo $this->Form->create($page);
						?>
						
						<div class="form-group">
						
						<?php
							echo $this->Form->input('', ['name' => 'emailMessage', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'Adres E-mail']);
						?>
						</div>
						<div class="form-group">
						<?php
							echo $this->Form->textarea('', ['name' => 'contentMessage','rows' => '3', 'class' => 'form-control', 'placeholder' => 'Wiadomość']);
						?>
						</div>
						<?php
						
						echo $this->Form->button('Wyślij', ['class' => 'btn btn-primar']);
						echo $this->Form->end();
						?>
					</div>
					
					<div class="col-sm-3">
					<?php
					if(isset($_POST['emailMessage']) && isset($_POST['contentMessage']) && !empty($_POST['emailMessage']) && !empty($_POST['contentMessage'])) {
						$connection = ConnectionManager::get('default');
						$results = $connection->execute("INSERT INTO messages SET emailMessage='".$_POST['emailMessage']."', contentMessage='".$_POST['contentMessage']."'");
					}
					?>
					</div>
				</div>
			</div>				
		</div>
		
		<div class="row">
			<div class="col-xs-12 footer text-right">
				Stopka © 2016
			</div>
		</div>
	</div>
</div>
</body>
</html>