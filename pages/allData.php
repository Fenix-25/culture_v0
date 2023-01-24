<?php $cultures = cultures(); ?>
<?php $users = users(); ?>
<?php $squares = squares(); ?>
<h4>Cultures</h4>
<?php foreach ($cultures as $culture): ?>
    <div class="card">
        <span><?= $culture['name'] ?></span>
        <form action="/" method="post">
            <input type="hidden" name="type" value="deleteCulture">
            <input type="hidden" name="cultureId" value="<?= $culture['id'] ?>">
            <button type="submit">delete</button>
        </form>
    </div>
<?php endforeach; ?>
<h4>Users</h4>
<?php foreach ($users as $user): ?>
    <div class="card">
        <span><?= $user['name'] . " " . $user['surname'] ?></span>
        <form action="/" method="post">
            <input type="hidden" name="type" value="deleteUser">
            <input type="hidden" name="userId" value="<?= $user['id'] ?>">
            <button type="submit">delete</button>
        </form>
    </div>
<?php endforeach; ?>
<h4>Square</h4>
<?php foreach ($squares as $square): ?>
    <div class="card">
        <span><?= $square['square'] ?></span>
        <form action="/" method="post">
            <input type="hidden" name="type" value="deleteSquare">
            <input type="hidden" name="userId" value="<?= $square['user_id'] ?>">
            <input type="hidden" name="squareId" value="<?= $square['id'] ?>">
            <button type="submit">delete</button>
        </form>
    </div>
<?php endforeach; ?>
