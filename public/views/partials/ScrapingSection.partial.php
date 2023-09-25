<div class="container text-center">
    <div class="row">
        <div class="col">
            <h2 class="website-tittle">Amazon</h2>
            <?php foreach ($amazon_results as $result):?>
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
                                    <p class="card-text">Fecha de entrega: <?=$result['delivery_date']?></p>
                                    <p class="card-text"><small class="text-body-secondary">País de envío: <?=$result['delivery_country']?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
          <?php endforeach?>
        </div>
    </div>
    <div class="row">
    </div>
</div>