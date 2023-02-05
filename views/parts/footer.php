</main>
</div>
</div>

<?php
 require_once 'views/parts/error.php';
 require_once 'views/parts/msg.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        <?php if (!empty($_SESSION['notify'])): ?>
        $('.toast').toast('show');
        <?php endif; ?>
    });
</script>
<?php unset($_SESSION['notify']); ?>
<script src="../../assets/main.js"></script>
</body>
</html>
