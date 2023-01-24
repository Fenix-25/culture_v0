<?php $cultures = cultures(); ?>
<?php $users = users(); ?>
<?php $squares = squares(); ?>
<?php if (count($cultures) > 0): ?>
    <div class="tables">
        <?php if (count($squares) > 0): ?>
            <table class="orders">
                <tr>
                    <th>Order ID</th>
                    <th>Owner</th>
                    <th>Square</th>
                    <th>Culture</th>
                    <th>Config</th>
                </tr>
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
            </table>
            <table class="cultures">
                <tr>
                    <th>Culture</th>
                    <th>Square</th>
                </tr>
                <?php foreach ($cultures as $culture): ?>
                    <tr>
                        <td>
                            <?= $culture['name'] ?>
                        </td>
                        <td>
                            <?php $square = squaresSum($culture['id']) ?>
                            <?= $square['sum(square)'] ? round($square['sum(square)'], 2) : "" ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <table class="users">
            <tr>
                <th>Users</th>
                <th>Culture</th>
                <th>Available to use</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?= $user['name'] . " " . $user['surname'] ?>
                    </td>
                    <td>
                        <?php foreach ($squares as $square): ?>
                            <?php foreach ($cultures as $culture): ?>
                                <?php if ($user['id'] == $square['user_id']): ?>
                                    <?php if ($culture['id'] == $square['culture_id']): ?>
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
        </table>
    </div>
<?php else: ?>
    <a href="/createCulture">Create Culture</a>
<?php endif; ?>


