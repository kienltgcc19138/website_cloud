<?php
    session_destroy();
    echo '<script>alert("Logout successful");</script>';
    echo '<meta http-equiv="refresh" content="0; URL=index.php" />';
?>