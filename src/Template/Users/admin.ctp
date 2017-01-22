<?php
session_start();
if(!isset($_SESSION['admin']))
{
header("Location: /IAB/");
exit;
}
?>

<br/>
<br/>
<div class="container">

<div class="row">

<div class="col-xs-12 col-sm-3">
<a href="/IAB/categories/index">Kategorie</a>
</div>

<div class="col-xs-12 col-sm-3">
<a href="/IAB/subcategories/index">Podkategorie</a>
</div>


<div class="col-xs-12 col-sm-3">
<a href="/IAB/products/index">Produkty</a>
</div>

<div class="col-xs-12 col-sm-3">
<a href="/IAB/users/index">Użytkownicy</a>
</div>

</div>


</div>
