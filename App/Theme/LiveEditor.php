<?=  getWidjet("header",[]) //Debug($view) ?>
<?php if(isset($view['content'])): ?>
    <?php foreach($view['content'] as $keys => $values): ?>

    <?php //Debug($values) ?>
    <section class="<?= isset($values['class']) ? implode(" ", $values['class']) : null  ?>">
        <div class="BlocsContainer <?= (isset($values['container']) && $values['container'] === true) ? "wrap" : null ?>">
            <?php foreach($values["item"] as $keyw => $valuew): ?>
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
    </section>
    <?php endforeach; ?>
<?php endif; ?>