<?php

use Culture\DashboardController;

$cultures = DashboardController::cultures(); ?>
<div class="table-responsive">
    <table class="table table-bordered  table-sm">
        <thead>
        <tr>
            <th scope="col">Fertilize/Culture</th>
            <?php foreach ($cultures as $culture): ?>
                <?php foreach ($culture_id as $value): ?>
                    <?php if ($culture['id'] == $value['id']): ?>
                        <th scope="col"><?= $culture['name'] ?></th>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($fertilizes as $fertilize): ?>
            <tr>
                <td>
                    <?= $fertilize['name'] ?>
                </td>
                <?php foreach ($prop as $value): ?>
                    <?php if ($fertilize['id'] == $value['fertilize_id']): ?>
                        <td>
                            <?= $value['qty'] ?>
                        </td>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>