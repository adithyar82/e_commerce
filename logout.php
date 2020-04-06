<?php
session_start();
session_destroy();
echo '<script>
window.location = "category.php";
</script>';
?>