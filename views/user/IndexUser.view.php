<h2>Your orders</h2>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>User</th>
        <th>Square</th>
        <th>Is share</th>
        <th>Price</th>
        <th>Create at</th>
        <th>End after</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $order['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $order['square'] ?></td>
            <td> <?= $order['is_share'] ? "Yes" : "No" ?></td>
            <td><?= $order['price'] ?></td>
            <td><?= \Culture\Controller::timeFormat($order['created_at']) ?></td>
            <td><?= \Culture\Controller::timeFormat($order['ended_at']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
