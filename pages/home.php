
<?php $notes = userNotes();
if (count($notes) > 0): ?>
    <ul>
        <?php foreach ($notes as $note): ?>
            <li>
                <a href="/noteSingle?id=<?= $note['id'] ?>">
            <span><?= $note['title'] ?> <||>
            </span> <?= substr($note['body'], 0, 21) ?>...
                </a>
                <?php require './parts/delete.php'; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <a href="/createNote">Create one</a>
<?php endif; ?>

