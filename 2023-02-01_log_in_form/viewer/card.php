<div class="container">
<h2> Pasirinkite tinkamiausią kortelę </h2>

<?php for($i=1; $i<4; $i++){ ?>
      <div class="d-flex flex-row justify-center m-3">
            <div class="card" style="width: 36rem;">
                  <img src="https://www.visasoutheasteurope.com/dam/VCOM/regional/ap/taiwan/global-elements/images/tw-visa-classic-card-498x280.png"
                        class="card-img-top" alt="visa card">
                  <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
            </div>
            <div>
                  <h3>Credit card <?=$i?></h3>
                  <p class="text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. In consectetur aperiam perspiciatis
                        iure saepe delectus doloribus fugiat dolores alias distinctio magnam vero, quae, repudiandae
                        iste.
                  </p>
                  <p class="text">
                        Ex alias quod repudiandae optio dolorem molestias repellendus animi necessitatibus non? Debitis
                        quo, fuga voluptates nisi praesentium placeat consequatur perspiciatis, commodi ex illum sequi
                        doloremque.
                  </p>
                  <a href="">Užsakyti kortelę ...</a>
            </div>
      </div>
<?php } ?>
</div>