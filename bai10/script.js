// Lấy danh sách công việc từ server và hiển thị
function loadTasks() {
    fetch('todo.php')
        .then(res => res.json())
        .then(renderList);
}

// Vẽ danh sách ra giao diện
function renderList(todos) {
    const list = document.getElementById('list');
    list.innerHTML = '';

    todos.forEach(t => {
        const li = document.createElement('li');
        if (t.done) li.classList.add('done');

        li.innerHTML = `
            <div class="left">
                <input type="checkbox" ${t.done ? 'checked' : ''} onchange="toggleTask('${t.id}')">
                <span>${t.text}</span>
            </div>
            <button class="delete-btn" onclick="deleteTask('${t.id}')">Xóa</button>
        `;
        list.appendChild(li);
    });
}

// Thêm công việc mới
function addTask() {
    const input = document.getElementById('task');
    const text = input.value.trim();
    if (text === '') return;

    fetch('todo.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'add', text })
    })
    .then(res => res.json())
    .then(renderList);

    input.value = '';
}

// Đánh dấu hoàn thành / chưa hoàn thành
function toggleTask(id) {
    fetch('todo.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'toggle', id })
    })
    .then(res => res.json())
    .then(renderList);
}

// Xóa công việc
function deleteTask(id) {
    fetch('todo.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'delete', id })
    })
    .then(res => res.json())
    .then(renderList);
}

// Cho phép nhấn Enter để thêm
document.getElementById('task').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') addTask();
});

loadTasks();