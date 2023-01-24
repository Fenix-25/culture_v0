</div>
</div>
<?php if (!empty($_SESSION['notify']['msg'])): ?>
    <p class="notify <?= $_SESSION['notify']['class'] ?>"><?= $_SESSION['notify']['msg']?></p>
<?php endif; ?>
<?php unset($_SESSION['notify']['msg']); ?>

<script src="assets/main.js"></script>
</body>
</html>
