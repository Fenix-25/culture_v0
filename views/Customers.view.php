<?php
use Culture\DashboardController;
$cultures = DashboardController::cultures();
$users = DashboardController::users();
$squares = DashboardController::squares(); ?>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Users</th>
            <th scope="col">Square</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?= $user['name'] . " " . $user['surname'] ?>
                </td>
                <td>
                    <?= $user['square_for_rent'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
