<?php $cultures = cultures(); ?>
<?php $users = users(); ?>
<?php $squares = squares(); ?>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Owner</th>
            <th scope="col">Square</th>
            <th scope="col">Culture</th>
            <th scope="col">Config</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($squares as $square): ?>
            <tr>
                <td>
                    <?= $square['id'] ?>
                </td>
                <td>
                    <?php foreach ($users as $user): ?>
                        <?php if ($square['user_id'] == $user['id']): ?>
                            <?= $user['name'] . " " . $user['surname'] ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?= $square['square'] ?>
                </td>
                <td>
                    <?php foreach ($cultures as $culture): ?>
                        <?php if ($square['culture_id'] == $culture['id']): ?>
                            <?= $culture['name'] ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php require 'parts/delete.php'?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>