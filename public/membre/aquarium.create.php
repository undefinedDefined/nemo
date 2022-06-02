<form class="row g-3" action="aquarium.create.process.php" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
        <label class="form-label">Bac</label>
        <input type="number" name="num_bac" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Prix</label>
        <input type="text" name="price" class="form-control" value="€">
    </div>
    <div class="col-md-6">
        <label class="form-label">Espèces</label>
        <input type="text" name="species" class="form-control" >
    </div>
    <div class="col-md-6">
        <label class="form-label">Nourriture</label>
        <input type="text" name="food_type" class="form-control" >
    </div>
    <div class="col-md-3">
        <label class="form-label">Volume d'eau</label>
        <input type="text" name="volume" class="form-control" >
    </div>
    <div class="col-md-3">
        <label class="form-label">Type d'eau</label>
        <select class="form-select" name="water_type">
            <option value="douce">Douce</option>
            <option value="sale">Sale</option>
        </select>
    </div>
    <div class="col-md-2">
        <label class="form-label">PH</label>
        <input type="number" min="1" max="14" step="0.1" name="ph" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Conductivité</label>
        <input type="text" name="conduct" class="form-control">
    </div>
    <div class="col-md-12">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
        <div class="input-group mb-3">
            <label class="input-group-text">Image</label>
            <input type="file" name="img" class="form-control">
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary float-end">Envoyer</button>
    </div>
</form>