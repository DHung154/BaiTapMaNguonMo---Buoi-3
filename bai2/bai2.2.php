<!DOCTYPE html>
<html>

<body>

<!-- Ô nhập văn bản -->
<input type="text" id="txt" placeholder="Nhập gì đó">

<!-- Nhấn nút sẽ gọi hàm showText() -->
<button onclick="showText()">Hiển thị</button>

<!-- Nơi hiển thị nội dung -->
<div id="output"></div>

<script>

// Hàm hiển thị nội dung người dùng nhập
function showText() {

    // Lấy giá trị từ ô nhập (txt)
    // Hiển thị vào thẻ có id="output"
    document.getElementById("output").innerText =
    document.getElementById("txt").value;
}

</script>

</body>
</html>