</div>
<?php if (!empty($_SESSION['notify']['msg'])): ?>
    <p class="notify <?= $_SESSION['notify']['class'] ?>"><?= $_SESSION['notify']['msg']?></p>
<?php endif; ?>
<?php unset($_SESSION['notify']['msg']); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/main.js"></script>
</body>
</html>
