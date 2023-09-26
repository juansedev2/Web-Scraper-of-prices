<form action="search" method="GET">
    <div class="input-group input-group-lg">
        <input type="text" name="keywords" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Escribe lo que deseas buscar..." value="<?= $_GET["keywords"] ?? "" ?>">
        <button type="submit" class="btn btn-light">Buscar</button>
    </div>
    <?php if(isset($_GET["keywords"])):?>
        <div class="m-3 w-25">
            <select class="form-select" aria-label="Default select example">
            <option value="normal">Normal</option>
            <option value="asc">De menor a mayor precio</option>
            <option value="dsc">De mayor a menor precio</option>
            </select>
        </div>    
    <?php endif;?>
</form>