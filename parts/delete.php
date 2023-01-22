<form action="/" method="post">
    <input type="hidden" name="type" value="delete">
    <input type="hidden" name="noteId" value="<?= $note['id'] ?>">
    <button type="submit">delete</button>
</form>