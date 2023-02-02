<?php if (!empty($_SESSION['notify']['error'])): ?>
    <div class="toast-container p-3 bottom-0 end-0">
        <?php foreach ($_SESSION['notify']['error'] as $item): ?>
            <div class="toast align-items-center text-bg-<?= $item['class'] ?> border-0" role="alert"
                 aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= $item['msg'] ?>
                    </div>
                    <button type="submit" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>