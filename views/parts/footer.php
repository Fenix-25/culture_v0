</main>
</div>
</div>
<div class="toast align-items-center text-bg-<?= $_SESSION['notify']['class'] ?> border-0" role="alert"
     aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
            <?= $_SESSION['notify']['msg'] ?>
        </div>
        <button type="submit" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        <?php if (!empty($_SESSION['notify']['msg'])): ?>
        $('.toast').toast('show');
        <?php endif; ?>
    });
</script>
<?php unset($_SESSION['notify']['msg']); ?>
<script src="../../assets/main.js"></script>
</body>
</html>
