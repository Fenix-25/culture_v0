<div class="table-responsive">
    <table class="table table-bordered  table-sm">
        <thead>
        <tr>
            <th scope="col">Culture/Fertilize</th>
            <?php foreach ($fertilizes as $fertilize): ?>
                <th><?= $fertilize['name'] ?></th>
            <?php endforeach; ?>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0; foreach ($cultures as $culture): ?>
            <tr>
                <td>
                    <?= $culture['name'] . "/" . $culture['id'] ?>
                </td>
                <?php foreach ($props as $prop): ?>
                    <?php foreach ($prop as $key => $value): ?>
                        <?php if (!array_key_exists($culture['id'], $prop)): ?>
                            <td>0</td>
                        <?php break?>
                        <?php endif; ?>
                        <?php foreach ($fertilizes as $fertilize): ?>
                            <?php if ($fertilize['id'] == $value['fertilize_id']): ?>
                                <?php if ($culture['id'] == $key): ?>
                                    <td <?= $value['qty'] > 0 ? "style = 'background:#eee'" : ""; ?>>
                                        <?= $value['qty'] ?>
                                    </td>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        <tr class="table-info">
            <td>Total:</td>
            <?php foreach ($props as $prop): ?>
                <?php foreach ($prop as $key => $value): ?>
                    <?php if (!array_key_exists($culture['id'], $prop)): ?>
                        <td>0</td>
                        <?php break?>
                    <?php endif; ?>
                    <?php foreach ($fertilizes as $fertilize): ?>
                        <?php if ($fertilize['id'] == $value['fertilize_id']): ?>
                            <?php if ($culture['id'] == $key): ?>
                                <td>
                                  0
                                </td>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>

        </tbody>
    </table>
</div>