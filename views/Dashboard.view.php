<?php
use Culture\DashboardController;
$cultures = DashboardController::cultures();
$users = DashboardController::users();
$orders =DashboardController::orders(); ?>
<?php if (count($cultures) > 0): ?>
        <?php if (count($orders ) > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Culture</th>
                    <th scope="col">Square</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cultures as $culture): ?>
                    <tr>
                        <td>
                            <?= $culture['name'] ?>
                        </td>
                        <td>
                            <?php $order = DashboardController::squaresSum($culture['id']);?>
                            <?= $order['sum(square)'] ? round($order['sum(square)'], 2) : "" ?>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Users</th>
                    <th scope="col">Culture</th>
                    <th scope="col">Available to use</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?= $user['name'] . " " . $user['surname'] ?>
                        </td>
                        <td>
                            <?php foreach ($orders  as $order): ?>
                                <?php foreach ($cultures as $culture): ?>
                                    <?php if ($user['id'] == $order['user_id']): ?>
                                        <?php if ($culture['id'] == $order['culture_id']): ?>
                                            <?= $culture['name'] . ", " ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?= $user['square'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
<?php else: ?>
    <a href="/createCulture">Create Culture</a>
<?php endif; ?>
