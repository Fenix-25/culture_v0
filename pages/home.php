<?php $cultures = cultures(); ?>
<?php $users = users(); ?>
<?php $squares = squares(); ?>
<?php $squaresSum = squaresSum(); ?>
<?php if (count($cultures) > 0): ?>
    <table class="users">
        <tr>
            <th>Users</th>
            <th>Culture</th>
            <th>Square</th>
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
                                    <?= $culture['name'] ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php foreach ($squares as $square): ?>
                        <?php if ($user['id'] == $square['user_id']): ?>
                            <?= $square['square'] ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
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
<!--            --><?php //for ($i = 0; $i < count($squares); $i++): ?>
                <tr>
                    <td>
                        <?= $culture['name'] ?>
                    </td>
                    <td>
                        <?= d($squaresSum) ?>
                    </td>
                </tr>
<!--            --><?php //endfor; ?>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <a href="/createCulture">Create Culture</a>
<?php endif; ?>


