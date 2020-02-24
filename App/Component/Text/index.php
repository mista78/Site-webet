<div class="Text">
    <?= isset($title) ? "<h1>$title</h1>" : null ?>
    <?= isset($text) ? "<p>$text</p>" : null ?>
    <?= isset($content) ? "<p> " .nl2br($content).  " </p>" : null ?>
</div>