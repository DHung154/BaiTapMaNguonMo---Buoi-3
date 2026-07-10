<!DOCTYPE html>
<html>
<body>

<!-- Ô nhập nội dung -->
<input type="text" id="item">

<!-- Nhấn nút sẽ gọi hàm addItem() -->
<button onclick="addItem()">Thêm</button>

<!-- Danh sách sẽ hiển thị ở đây -->
<ul id="list"></ul>

<script>

function addItem() {

    // Lấy nội dung từ ô nhập
    let val = document.getElementById("item").value;

    // Kiểm tra ô nhập không được rỗng
    if (val.trim() !== "") {

        // Tạo thẻ <li> mới
        let li = document.createElement("li");

        // Gán nội dung cho thẻ <li>
        li.innerText = val;

        // Thêm <li> vào danh sách <ul>
        document.getElementById("list").appendChild(li);
    }
}

</script>

</body>
</html>