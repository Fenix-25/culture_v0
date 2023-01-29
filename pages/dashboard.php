<?php $cultures = cultures(); ?>
<?php $users = users(); ?>
<?php $squares = squares(); ?>
<?php if (count($cultures) > 0): ?>
        <?php if (count($squares) > 0): ?>
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
                            <?php $square = squaresSum($culture['id']) ?>
                            <?= $square['sum(square)'] ? round($square['sum(square)'], 2) : "" ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
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
                </tbody>
            </table>
        </div>
<?php else: ?>
    <a href="/createCulture">Create Culture</a>
<?php endif; ?>
