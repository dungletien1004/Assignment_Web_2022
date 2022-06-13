<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
 
<?php
// xóa tất cả các biến session
session_unset(); 
session_destroy(); 
header("Location: ./index.php");
?>
 
</body>
</html>