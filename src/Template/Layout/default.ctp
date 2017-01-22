<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
} 

$cakeDescription = 'CakePHP: the rapid development php framework';
use Cake\Datasource\ConnectionManager;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('fontello/css/fontello.css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<?php echo $this->Html->link('Sklep internetowy', ['controller' => 'pages', 'action' => 'display', 'home'], ['class'=>'navbar-brand']); ?>
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
<br/>
<br/>

<div class="my-container">
<div class="row">
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</div>
</div>
</body>
</html>
