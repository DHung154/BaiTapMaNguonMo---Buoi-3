<!DOCTYPE html>
<html>
<body>
<div id="info"></div>
<script>
let name = "An";
let age = 20;
//dùng để in dữ liệu ra Console của trình duyệt
console.log(name, age);
// tim the Info , dua noi dung vao the do
document.getElementById("info").innerHTML = `Tên: ${name}, Tuổi:
${age}`;
</script>
</body>
</html>