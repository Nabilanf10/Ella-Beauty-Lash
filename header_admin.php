<div style="display: flex; gap: 15px;">
    <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="admin.php">List Reservasi</a></li>
        <li><a href="logout.php">Log-out</a></li>
    <?php else: ?>
    <?php endif; ?>
</div>