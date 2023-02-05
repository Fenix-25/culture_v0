<?php use Culture\DashboardController;
$cultures = DashboardController::cultures();
$users = DashboardController::users(); ?>
<form action="/" method="post">
    <input type="hidden" value="createOrder" name="type">
    <label for="culture">Culture</label>
    <select name="culture" id="culture">
        <?php foreach ($cultures as $culture): ?>
            <option value="<?= $culture['id'] ?>"><?= $culture['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="select-element">User</label>
    <select name="user" id="select-element">
        <option></option>
        <?php foreach ($users as $user): ?>
            <?php if (!empty($user['square'])): ?>
                <option value="<?= $user['id'] ?>"
                        data-max="<?= $user['square'] ?>"><?= $user['name'] . " " . $user['surname'] ?>
                </option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select> <br>
    <label for="input-element">Square</label>
    <input id="input-element" type="number" min="0.01" step="0.01" placeholder="Square" name="square" max=""> ha <br>
    <input type="number" min="0.01" step="0.01" placeholder="Price" name="price" ><br>
    <label for="isShare">Is share</label><input type="checkbox" name="isShare" id="isShare" value="1"> <br>
    <input type="submit" value="Save">
</form>