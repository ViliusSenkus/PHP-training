<div class="container">
      <h2> Rinkitės aprūpintą senatvę </h2>

<?php 
$loans=array("1 pakopos pensijos kaupimas", "2 pakopos pensijos kaupimas", "3 pakopos pensijos kaupimas", "pensijų išmokos");


foreach ($loans as $l){
?>
      <div>
            <h3><?= $l ?></h3>
            <div class="text">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non aliquid fugit est inventore voluptates, vitae laudantium ex cupiditate reprehenderit alias ullam eum architecto molestias quia maiores a quas, eius possimus sapiente dignissimos maxime saepe debitis. Recusandae nam <br/> optio quasi asperiores totam! Fuga dolorum facilis debitis sit atque sed veniam cum voluptates natus libero quis tenetur eius minus, alias, non suscipit aut quisquam ipsam quos necessitatibus?
            </div>
            <a href="">Daugiau informacijos ...</a>
      </div>

<?php } ?>
</div>