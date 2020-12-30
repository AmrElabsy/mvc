<form action="<?= path("roles/edit"); ?>" method="POST">
    <input type="hidden" name="id" value="<?= $role->getId(); ?>">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Role Name: </label>
        <div class="col-sm-10">
            <input class="form-control" name="name" type="text" value="<?= $role->getRole(); ?>" id="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Role Permissions: </label>
        <div class="col-sm-10">
            <div class="row">
                <?php foreach( $permissions as $permission ): ?>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" class="" id="permission<?= $permission->getId(); ?>" name="permissions[]" value="<?= $permission->getId(); ?>" <?= $role->hasPermission( $permission->getPermission() ) ? "checked" : "" ; ?> />
                        <label class="" for="permission<?= $permission->getId(); ?>"><?= $permission->getPermission(); ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-md-2">
            <input type="submit" class="btn btn-success waves-effect waves-light" value="Submit">
        </div>
    </div>
</form>