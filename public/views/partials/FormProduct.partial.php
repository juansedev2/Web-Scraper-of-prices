<form action="search" method="GET">
    <div class="input-group input-group-lg">
        <input type="text" name="keywords" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Escribe lo que deseas buscar..." value="<?= $_GET["keywords"] ?? "" ?>" id="product_input" required>
        <button type="submit" class="btn btn-light">Buscar</button>
    </div>
    <div class="m-3 w-25">
        <select class="form-select" id="order_product" aria-label="Default select example" name="order" required>
            <?php if(isset($_GET["order"])) :?>
                <option <?= $_GET["order"] == "normal" ? "selected" : "" ?> value="normal">Normal</option>
                <option <?= $_GET["order"] == "asc" ? "selected" : " " ?> value="asc">De menor a mayor precio</option>
                <option <?= $_GET["order"] == "dsc" ? "selected" : " " ?> value="dsc">De mayor a menor precio</option>
            <?php else:?>
                <option selected value="normal">Normal</option>
                <option value="asc">De menor a mayor precio</option>
                <option value="dsc">De mayor a menor precio</option>
            <?php endif;?>
        </select>
    </div>    
</form>