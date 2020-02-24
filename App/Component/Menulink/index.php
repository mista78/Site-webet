<li>
	<a href="<?= Router::url($url) ?: "#" ?>"><?= $name ?></a>
	<?= (isset($section)) ? getWidjet("header",$section) : null ?>
</li>