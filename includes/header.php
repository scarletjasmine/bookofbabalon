<header class="site-header">
    <div class="container">
        <div class="logo">
            <a href="index.php">
                <h1><i class="fas fa-code"></i> PHP Site</h1>
            </a>
        </div>
        
        <nav class="main-nav">
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            <ul>
                <li><a href="index.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>>Home</a></li>
                <li><a href="contact.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="active"' : ''; ?>>Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<script>
    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const mainNav = document.querySelector('.main-nav ul');
        
        mobileMenuBtn.addEventListener('click', function() {
            mainNav.classList.toggle('show');
        });
    });
</script>
