<?php // Filename: footer.inc.php 
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12 col-lg-12 text-center">
            <p><?php echo '<span class="font-weight-bold">' . $app_name . ' - Version ' . $app_version . "</span><br>" . $app_copyright; ?></p>
            <p>Mode: <?= $app_status == "dev" ? "Development" : "Production" ?></p>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>