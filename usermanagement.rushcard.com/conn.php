<?php
$servername = "localhost"; // الخاص بالسيرفر ip اسم السيرفر أو 
$username = "root";    // اسم المستخدم الخاص بقاعدة البيانات
$password = "";  
$dbname="mido"  ;// كلمة المرور الخاصة بقاعدة البيانات
// انشاء الاتصال
$conn = mysqli_connect($servername, $username, $password,$dbname);
// $conn هذا المتغير الخاص بالاتصال سوف نحتاجه في اي عملية نرغب بإجرائها على قاعدة البيانات
// التأكد من عملية الاتصال بسيرفر قاعدة البيانات 


?>