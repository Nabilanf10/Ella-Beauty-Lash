<style>
    .nav-menu {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    @media (max-width: 768px) {
        .nav-menu {
            display: none;
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

<div class="nav-menu" id="navMenu">
    <li><a href="index.php">Beranda</a></li>
    <li><a href="index.php#tentang">Tentang</a></li>
    <li><a href="index.php#porthofolio">Phortofolio</a></li>
    <li><a href="index.php#perawatan">Perawatan</a></li>
    <li><a href="index.php#kontak">Kontak</a></li>
    <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="reservasi.php">Reservasi</a></li>
    <?php endif; ?>
    <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="riwayat_reservasi.php">Riwayat Reservasi</a></li>
        <li><a href="logout.php">Log-out</a></li>
    <?php else: ?>
        <li><a href="login.php">Log-in</a></li>
    <?php endif; ?>
</div>

<script>
    function toggleMenu() {
        var navMenu = document.getElementById('navMenu');
        if (navMenu.style.display === 'flex') {
            navMenu.style.display = 'none';
        } else {
            navMenu.style.display = 'flex';
        }
    }
</script>