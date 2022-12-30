<html>
<body>
<?php
$info = imagetypes();
if ($info & IMG_PNG) {
    print("Mendukung PNG");
} else {
    print("Tidak mendukung PNG");
}
?>
</body>
</html>
