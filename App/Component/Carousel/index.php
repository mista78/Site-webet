<div class="Carousel">  
  <div class="slideshow-container">
    <?php if(isset($data)): ?>
      <?php foreach($data as $k => $v): ?>
          <?php if($k < (@$limit ?: 6) ): ?>
            <div class="mySlides">
              <?= getWidjet("item", $data[$k]) ?>
            </div>
          <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>