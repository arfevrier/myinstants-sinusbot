<?php
$final = '';
if(isset($_GET['n'])){
	$final = get_button_page($_GET['n']);
	$n_page = $_GET['n'];
} else {
	$final = get_button_page(1);
	$n_page = 1;
}
echo '<div id="instants_container">'.$final.'</div>';
?>
<h3 id="moar_header" style="margin: 40px auto; text-align: center; font-size: 25px;">
	<?php if($n_page != 1): ?>
	<a id="moar" href="?n=<?php echo $n_page-1; ?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="font-size:24px;"></span> PREVIOUS PAGE</a>
    <span style="font-size:28px;"> | </span>
    <?php endif; ?>
	<a id="moar" href="?n=<?php echo $n_page+1; ?>">NEXT PAGE <span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="font-size:24px;"></span></a>
</h3>