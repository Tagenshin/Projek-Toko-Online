<?php
session_start();
// menghancurkan sesseion
session_destroy();

echo "<script>alert('Anda telah logout'); location='index.php';</script>";

?>