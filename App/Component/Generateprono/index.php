<?php $tab = []?>
<?php foreach($data as $v): ?>
        <?php array_push($tab, [
            "type" => "input", 
            "name" => "sport", 
            'label' => $v['name'],
            'options' => ['type' => 'radio']
            ]); ?>
    <?php endforeach ?>

    <?php array_push($form['form'], $tab) ?>   

<div class="generateContent">
    <h1>Générer un coupon</h1>
    <?= getWidjet("form",$form)?>
</div>



