<a href="<?= path("roles/add") ?>" class="btn btn-success">Add New Role</a>
<div class="table-responsive">
    <table class="table table-striped mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Role</th>
            <th>Permissions</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role):
                $permissions = $role->getPermissions();
                ?>
                <tr>
                    <th scope="row"><?= $role->getId(); ?></th>
                    <td><?= $role->getRole(); ?></td>
                    <td><?php foreach ( $permissions as $permission ): ?>
                        <span class="badge badge-primary"><?= $permission->getPermission() ?></span>

                        <?php endforeach; ?>
                    </td>
                    <td>
                        <a href="<?= path("roles/edit/" . $role->getId() ); ?>" class="btn btn-primary waves-effect waves-light">Edit</a>
                        <a href="<?= path("roles/delete/" . $role->getId() ); ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>