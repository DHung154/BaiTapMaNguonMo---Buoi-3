<!DOCTYPE html>
<html>
<body>

<!-- Ô nhập tuổi -->
<input type="number" id="age" placeholder="Nhập tuổi">

<!-- Nhấn nút sẽ gọi hàm checkAge() -->
<button onclick="checkAge()">Kiểm tra</button>

<!-- Nơi hiển thị kết quả -->
<p id="result"></p>

<script>

// Hàm kiểm tra tuổi
function checkAge() {

    // Lấy giá trị người dùng nhập
    let age = document.getElementById("age").value;

    // Nếu tuổi >= 18
    if (age >= 18) {

        // Hiển thị kết quả
        document.getElementById("result").innerText = "Bạn đã đủ tuổi";

    } else {

        // Nếu tuổi < 18
        document.getElementById("result").innerText = "Bạn chưa đủ tuổi";
    }
}

</script>

</body>
</html>