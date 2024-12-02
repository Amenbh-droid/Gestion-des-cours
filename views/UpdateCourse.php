<?php

include '../controller/CourseController.php';

$error = "";
$course = null;

// Create an instance of the controller
$courseController = new CourseController();

// Check if an ID is provided to fetch the course details
if (isset($_GET['id'])) {
    $course = $courseController->showCourse($_GET['id']); // Fetch the course details by ID
    if (!$course) {
        $error = "Course not found.";
    }
}

// Handle form submission
if (
    isset($_POST["id"], $_POST["title"], $_POST["description"], $_POST["price"], $_POST["teacher_id"], $_POST["study_duration"], $_POST["level"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["title"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["price"]) &&
        !empty($_POST["teacher_id"]) &&
        !empty($_POST["study_duration"]) &&
        !empty($_POST["level"])
    ) {
        // Create a Course object
        $course = new Course(
            $_POST['id'],
            $_POST['title'],
            $_POST['description'],
            floatval($_POST['price']),
            intval($_POST['teacher_id']),
            intval($_POST['study_duration']),
            $_POST['level']
        );

        // Update the course
        $courseController->updateCourse($course, $_POST['id']);

        // Redirect to the course list page
        header('Location: ListCourse.php');
        exit;
    } 
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <style>
        header {
            background-color: #e26e0e;
            padding: 15px;
            text-align: center;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            color: #333;
        }

        .container {
            margin: 50px auto;
            width: 50%;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            border: none;
            background-color: #03224c;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #fb470d;
        }

        #error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1><a href="ListCourse.php" style="text-decoration: none; color: white;">Back to Course List</a></h1>
    </header>

    <div id="error">
        <?php echo htmlspecialchars($error); ?>
    </div>

    <div class="container">
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id">ID:</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($course['id'] ?? ''); ?>"  />
                        <span id="title_error" style="color: red; font-size: 0.9em;"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="title">Title:</label></td>
                    <td>
                        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($course['title'] ?? ''); ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="description">Description:</label></td>
                    <td>
                        <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($course['description'] ?? ''); ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="price">Price:</label></td>
                    <td>
                        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($course['price'] ?? ''); ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="teacher_id">Teacher ID:</label></td>
                    <td>
                        <input type="text" id="teacher_id" name="teacher_id" value="<?php echo htmlspecialchars($course['teacher_id'] ?? ''); ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="study_duration">Study Duration:</label></td>
                    <td>
                        <input type="text" id="study_duration" name="study_duration" value="<?php echo htmlspecialchars($course['study_duration'] ?? ''); ?>" />
                    </td>
                </tr>
                <tr>
    <td><label for="level">Level:</label></td>
    <td>
        <select id="level" name="level">
            <option value="beginner" <?php echo (isset($course['level']) && $course['level'] === 'beginner') ? 'selected' : ''; ?>>Beginner</option>
            <option value="intermediate" <?php echo (isset($course['level']) && $course['level'] === 'intermediate') ? 'selected' : ''; ?>>Intermediate</option>
            <option value="advanced" <?php echo (isset($course['level']) && $course['level'] === 'advanced') ? 'selected' : ''; ?>>Advanced</option>
        </select>
    </td>
</tr>

                <tr>
                    <td>
                        <button type="submit"><strong>SAVE</strong></button>
                    </td>
                    <td>
                        <button type="reset"><strong>RESET</strong></button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script src="../views/addcourse..js"></script>
</body>

</html>