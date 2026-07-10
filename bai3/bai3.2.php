<html>
<body>

<!-- Khi nhấn nút Submit sẽ gọi hàm validateEmail() -->
<form onsubmit="return validateEmail()">

    <!-- Ô nhập email -->
    <input type="text" id="email" placeholder="Nhập email">

    <!-- Nút gửi -->
    <button type="submit">Kiểm tra</button>

</form>

<!-- Hiển thị kết quả -->
<p id="msg"></p>

<script>

function validateEmail() {

    // Lấy email người dùng nhập
    let email = document.getElementById("email").value;

    // Mẫu kiểm tra email (Regular Expression)
    let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Kiểm tra email có đúng định dạng không
    if (regex.test(email)) {

        // Email hợp lệ
        document.getElementById("msg").innerText = "Email hợp lệ";

    } else {

        // Email không hợp lệ
        document.getElementById("msg").innerText = "Email không hợp lệ";
    }

    // Không cho form tải lại trang
    return false;
}

</script>

</body>
</html>