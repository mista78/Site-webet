<li>
	<a href="<?= isset($url) ? Router::url($url) : "#" ?>"><?= $name ?></a>
	<?= (isset($section)) ? getWidjet("header",$section) : null ?>
</li>