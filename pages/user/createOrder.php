<?php $cultures = cultures(); ?>
<?php $users = users(); ?>
<form action="/" method="post">
    <input type="hidden" value="createOrder" name="type">
    <input type="number" step="0.01" placeholder="Square" name="square"> ha <br>
    <select name="culture" id="">
        <?php foreach ($cultures as $culture): ?>
            <option value="<?= $culture['id'] ?>"><?= $culture['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <select name="user" id="">
        <?php foreach ($users as $user): ?>
            <option value="<?= $user['id'] ?>"><?= $user['name']. " " .$user['surname'] ?></option>
        <?php endforeach; ?>
    </select> <br>
    <input type="submit" value="Save">
</form>