<?php if(isset($text)): ?>
    <div class="row mb-6">
        <div class="col-md-12">
            <?= getWidjet("text", $text) ?>
        </div>
    </div>
<?php endif; ?>
<?php if(isset($data)): ?>
    <div class="row">
        <?php foreach($data as $k => $v): ?>
            <?php if($k < (@$limit ?: 6) ): ?>
                <div class="col-md-4">
                    <?= getWidjet("item", $data[$k]) ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
