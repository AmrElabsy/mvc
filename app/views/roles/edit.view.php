<form>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Role Name: </label>
        <div class="col-sm-10">
            <input class="form-control" type="text" value="<?= $role->getRole(); ?>" id="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Role Permissions: </label>
        <div class="col-sm-10">
            <div class="row">
                <?php foreach( $permissions as $permission ): ?>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" class="" id="permission<?= $permission->getId(); ?>" name="permission[]" value=<?= $permission->getId(); ?> <?= $role->hasPermission( $permission->getPermission() ) ? "checked" : "" ; ?> />
                        <label class="" for="permission<?= $permission->getId(); ?>"><?= $permission->getPermission(); ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</form>