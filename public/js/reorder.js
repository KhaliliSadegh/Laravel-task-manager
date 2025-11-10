document.addEventListener("DOMContentLoaded", function () {
    const taskList = document.getElementById("task-list");
    if (!taskList) return;

    let dragging;

    // Enable drag and drop
    taskList.querySelectorAll("li").forEach(item => {
        item.setAttribute("draggable", "true");
    });

    taskList.addEventListener("dragstart", (e) => {
        dragging = e.target;
        e.target.classList.add("opacity-50");
    });

    taskList.addEventListener("dragover", (e) => {
        e.preventDefault();
        const afterElement = getDragAfterElement(taskList, e.clientY);
        if (afterElement == null) {
            taskList.appendChild(dragging);
        } else {
            taskList.insertBefore(dragging, afterElement);
        }
    });

    taskList.addEventListener("dragend", () => {
        dragging.classList.remove("opacity-50");

        const ids = Array.from(taskList.querySelectorAll("li")).map(li => li.dataset.id);

        fetch("/tasks/reorder", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ order: ids })
        })
        .then(res => res.json())
        .then(data => {
            console.log("Reordered successfully:", data);

            // ✅ Refresh the page to update priority numbers
            setTimeout(() => {
                window.location.reload();
            }, 300);
        })
        .catch(err => console.error("Reorder error:", err));
    });

    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll("li:not(.opacity-50)")];
        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        }, { offset: Number.NEGATIVE_INFINITY }).element;
    }
});
