<form action="<?= path("permissions/add"); ?>" method="POST">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Permission Name: </label>
        <div class="col-sm-10">
            <input class="form-control" name="name" type="text" id="name">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-md-2">
            <input type="submit" class="btn btn-success waves-effect waves-light" value="Submit">
        </div>
    </div>
</form>