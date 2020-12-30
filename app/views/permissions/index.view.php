<a href="<?= path("permissions/add") ?>" class="btn btn-success">Add New Permission</a>
<div class="table-responsive">
    <table class="table table-striped mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Permission</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($permissions as $permission):
                ?>
                <tr>
                    <th scope="row"><?= $permission->getId(); ?></th>
                    <td><?= $permission->getPermission(); ?></td>
                    <td>
                        <a href="<?= path("permissions/edit/" . $permission->getId() ); ?>" class="btn btn-primary waves-effect waves-light">Edit</a>
                        <a href="<?= path("permissions/delete/" . $permission->getId() ); ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>