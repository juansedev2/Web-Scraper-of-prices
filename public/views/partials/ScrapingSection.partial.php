<div class="container text-center">
    <div class="row">
        <div class="col">
            <h2 class="website-tittle">Ebay</h2>
            <?php foreach ($ebay_results as $result):?>
                <section id="scraping_results">
                    <div class="card mb-3 p-4" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?=$result['image']?>" alt="No se encontró la imagen" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a target="_blank" href="https://www.amazon.com/<?=$result['url']?>"><?=$result['tittle']?></a></h5>
                                    <p class="card-text">Precio: <?=$result['price']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
          <?php endforeach?>
        </div>
        <div class="col">
            <h2 class="website-tittle">Mercado libre</h2>
            <?php foreach ($mercado_libre_results as $result):?>
                <section id="scraping_results">
                    <div class="card mb-3 p-4" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?=$result['image']?>" alt="No se encontró la imagen" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a target="_blank" href="https://www.amazon.com/<?=$result['url']?>"><?=$result['tittle']?></a></h5>
                                    <p class="card-text">Precio: <?=$result['price']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endforeach?>
        </div>
    </div>
</div>