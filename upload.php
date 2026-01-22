<?php
// ارفع هذا الملف على استضافتك
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

// حاول رفع الملف
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "تم رفع الملف بنجاح!<br>";
    echo "اسم الملف: " . basename($_FILES["file"]["name"]) . "<br>";
    echo "الرابط: https://" . $_SERVER['HTTP_HOST'] . "/uploads/" . basename($_FILES["file"]["name"]);
    echo "<br><br><a href='index.html'>← العودة</a>";
} else {
    echo "حدث خطأ في رفع الملف.";
}
?>