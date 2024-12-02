document.getElementById("addCourseForm").addEventListener("submit", function (event) {
    let isValid = true;

    // Validate title
    const title = document.getElementById("title").value.trim();
    if (title === "") {
        document.getElementById("title_error").textContent = "Title is required.";
        isValid = false;
    } else {
        document.getElementById("title_error").textContent = "";
    }

    // Validate description
    const description = document.getElementById("description").value.trim();
    if (description === "") {
        document.getElementById("description_error").textContent = "Description is required.";
        isValid = false;
    } else {
        document.getElementById("description_error").textContent = "";
    }

    // Validate price
    const price = document.getElementById("price").value.trim();
    if (price === "" || isNaN(price) || price <= 0) {
        document.getElementById("price_error").textContent = "Price must be a positive number.";
        isValid = false;
    } else {
        document.getElementById("price_error").textContent = "";
    }

    // Validate teacher_id
    const teacherId = document.getElementById("teacher_id").value.trim();
    if (teacherId === "" || isNaN(teacherId) || teacherId <= 0) {
        document.getElementById("teacher_id_error").textContent = "Teacher ID must be a positive number.";
        isValid = false;
    } else {
        document.getElementById("teacher_id_error").textContent = "";
    }

    // Validate study_duration
    const studyDuration = document.getElementById("study_duration").value.trim();
    if (studyDuration === "" || isNaN(studyDuration) || studyDuration <= 0) {
        document.getElementById("study_duration_error").textContent = "Study duration must be a positive number.";
        isValid = false;
    } else {
        document.getElementById("study_duration_error").textContent = "";
    }

    // Validate level
    const level = document.getElementById("level").value.trim();
    if (level === "") {
        document.getElementById("level_error").textContent = "Level is required.";
        isValid = false;
    } else {
        document.getElementById("level_error").textContent = "";
    }

    if (!isValid) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});
