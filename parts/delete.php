<form action="/" method="post">
    <input type="hidden" name="type" value="deleteSquare">
    <input type="hidden" name="userId" value="<?= $square['user_id'] ?>">
    <input type="hidden" name="squareId" value="<?= $square['id'] ?>">
    <button type="submit">delete</button>
</form>