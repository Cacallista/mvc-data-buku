<?php if (!empty($_SESSION['flash'])): ?>
    <?php $flash = $_SESSION['flash']; unset($_SESSION['flash']); ?>
    <div style="padding:10px; margin:10px 0; border:1px solid;
        color:<?= $flash['type'] === 'success' ? '#155724' : '#721c24' ?>;
        background:<?= $flash['type'] === 'success' ? '#d4edda' : '#f8d7da' ?>;">
        <?= htmlspecialchars($flash['message']) ?>
    </div>
<?php endif; ?>