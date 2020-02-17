<div class="main-section <?= isset($class) ? implode(" ", $class) : null  ?>">
	<div class="BlocsContainer <?= (isset($container) && $container === true) ? "wrap" : null ?>">
		<?php foreach($item as $keyw => $valuew): ?>
		<div class="flex-bloc <?= isset($valuew['class']) ? implode(" ", $valuew['class']) : null  ?>">
			<?php //Debug($valuew) ?>
			<?= (isset($valuew['type']) && $valuew['type'] === "fullback") ? getWidjet("fullback",$valuew) : null ?>
			<?= (isset($valuew['type']) && $valuew['type'] === "posthero") ? getWidjet("posthero",$valuew) : null ?>
			<?= (isset($valuew['type']) && $valuew['type'] === "text") ? getWidjet("text",$valuew) : null ?>
			<?= (isset($valuew['type']) && $valuew['type'] === "item") ? getWidjet("item",$valuew) : null ?>
			<?= (isset($valuew['type']) && $valuew['type'] === "form") ? getWidjet("form",$valuew) : null ?>
			<?= (isset($valuew['type']) && $valuew['type'] === "tabs") ? getWidjet("tabs",$valuew) : null ?>
			<?= (isset($valuew['type']) && $valuew['type'] === "carousel") ? getWidjet("carousel",$valuew) : null ?>
		</div>
		<?php endforeach; ?>
	</div>
</div>