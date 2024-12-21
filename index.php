<?php
session_start();
if (empty($_SESSION['login'])) {
    echo "<script>
    window.location.href='login.php';
    </script>";
}
?>

<?php include 'config/database.php'; ?>
<?php include 'config/lib.php'; ?>
<?php include 'template/header.php'; ?>
<?php include 'template/navbar.php'; ?>
<?php include 'template/sidebar.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php include 'content.php'; ?>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include 'template/footer.php'; ?>
<?php include 'template/script.php'; ?>