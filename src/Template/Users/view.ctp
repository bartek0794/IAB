<?php
use Cake\Datasource\ConnectionManager;
session_start();
if(!isset($_SESSION['user']) || $_GET['id'] != $_SESSION['user']['id'] )
{
header("Location: /IAB/");
exit;
}

if(isset($_SESSION['admin'])) {
header("Location: /IAB/users/admin/");
exit;
}


$connection = ConnectionManager::get('default');
$results = $connection->execute('SELECT * FROM contact WHERE idUser="'.$_SESSION['user']['id'].'"')->fetchAll();

?>
<div class="container">
<div class="col-xs-12"><h3><?= $user->email ?></h3></div>

<div class="row">
<?php if(count($results)>0) {
echo '<a href="/IAB/contact/edit/'.$results[0][0].'">
<div class="col-xs-12 col-sm-3 data">
<i class="icon-pencil"></i>
<p>Edytuj dane</p>
</div>
</a>';
}
else{
echo '<a href="/IAB/contact/add">
<div class="col-xs-12 col-sm-3 data">
<i class="icon-pencil"></i>
<p>Uzupełnij dane</p>
</div>
</a>';
}
?>


<a href="/IAB/orders/index">
<div class="col-xs-12 col-sm-3 data">
<i class="icon-book-open"></i>
<p>Przejrzyj zamówienia</p>
</div></a>
<a href="/IAB/carts/index">
<div class="col-xs-12 col-sm-3 data">
<i class="icon-basket"></i>
<p>Zapisane koszyki</p>
</div></a>
<a href="/IAB/users/edit/<?php echo $_SESSION['user']['id']; ?>">
<div class="col-xs-12 col-sm-3 data">
<i class="icon-cog"></i>
<p>Zmień hasło</p>
</div></a>

</div>


</div>
