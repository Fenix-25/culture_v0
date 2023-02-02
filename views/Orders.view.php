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
                    <form action="/" method="post">
                        <input type="hidden" name="type" value="deleteSquare">
                        <input type="hidden" name="userId" value="<?= $order['user_id'] ?>">
                        <input type="hidden" name="orderId" value="<?= $order['id'] ?>">
                        <button type="submit" class="btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>