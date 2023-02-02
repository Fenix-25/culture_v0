<?php use Culture\DashboardController;

$cultures = DashboardController::cultures();
$users = DashboardController::users();
$orders =DashboardController::orders(); ?>
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
        <?php foreach ($orders  as $order): ?>
            <tr>
                <td>
                    <?= $order['id'] ?>
                </td>
                <td>
                    <?php foreach ($users as $user): ?>
                        <?php if ($order['user_id'] == $user['id']): ?>
                            <?= $user['name'] . " " . $user['surname'] ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?= $order['square'] ?>
                </td>
                <td>
                    <?php foreach ($cultures as $culture): ?>
                        <?php if ($order['culture_id'] == $culture['id']): ?>
                            <?= $culture['name'] ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php require 'views/parts/delete.php' ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>