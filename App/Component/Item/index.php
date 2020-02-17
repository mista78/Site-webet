<div class="News_item mb-2">
    <a href="<?= Router::url("blog/show/id:" . $id) ?>" class="News__image" style='background-image: url("<?php echo $img; ?>")'></a>
    <div class="News__content"><?php echo $name; ?></div>
</div>