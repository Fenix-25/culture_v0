</div>
</div>
<?php if (!empty($_SESSION['notify'])): ?>
    <p class="notify <?= $_SESSION['notify']['class'] ?>"><?= $_SESSION['notify']['msg'] ?></p>
<?php endif;
unset($_SESSION['notify']); ?>
</body>
</html>
