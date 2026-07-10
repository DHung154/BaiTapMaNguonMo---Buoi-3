<!DOCTYPE html>
<html>
<body>

<!-- Nút bấm, khi nhấn sẽ gọi hàm changeBg() -->
<button onclick="changeBg()">Đổi màu nền</button>

<script>

// Hàm đổi màu nền
function changeBg() {

    // document.body: lấy phần thân của trang web
    // style.backgroundColor: đổi màu nền
    // Math.random(): tạo số ngẫu nhiên
    // Math.floor(): làm tròn xuống thành số nguyên
    // toString(16): chuyển sang hệ 16 (mã màu Hex)
    document.body.style.backgroundColor = "#" +
    Math.floor(Math.random() * 16777215).toString(16);
}

</script>

</body>
</html>