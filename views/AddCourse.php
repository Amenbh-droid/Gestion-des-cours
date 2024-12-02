<?php
ob_start();
$error = ""; 
include '../controller/CourseController.php';
//create an instance of the controller 
$courseController = new CourseController();

if (
    isset($_POST["title"], $_POST["description"], $_POST["price"], $_POST["teacher_id"], $_POST["study_duration"], $_POST["level"])
) {
    if (
        !empty($_POST["title"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["price"]) &&
        !empty($_POST["teacher_id"]) &&
        !empty($_POST["study_duration"]) &&
        !empty($_POST["level"])
    ) {
        
        $course = new Course(
            null, 
            $_POST['title'],
            $_POST['description'],
            floatval($_POST['price']),
            intval($_POST['teacher_id']),
            intval($_POST['study_duration']),
            $_POST['level']
        );

      
            $courseController->addcourse($course);
            header('Location: ListCourse.php');
           
        
        }
     else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <style>
        header {
            background-color: #e26e0e;
            padding: 15px;
            text-align: center;
        }

        body {
            background-image: linear-gradient(to right, hsl(215, 92%, 15%, 0.8), hsl(215, 92%, 15%, 0.7)), url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 400px;
            background-color: rgba(255, 255, 255, 0.1);
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #f2f2f2;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100px;
            height: 35px;
            background-color: #03224c;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #fb470d;
        }

        #error {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1><a href="ListCourse.php" style="text-decoration: none; color: white;">Back to Course List</a></h1>
    </header>

    <div id="error">
        <?php echo $error; ?>
    </div>

    
    <form action="" method="POST" id="addCourseForm">
    <label for="title">Course Title:</label>
    <input type="text" id="title" name="title">
    <span id="title_error" style="color: red; font-size: 0.9em;"></span>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description">
    <span id="description_error" style="color: red; font-size: 0.9em;"></span>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01">
    <span id="price_error" style="color: red; font-size: 0.9em;"></span>

    <label for="teacher_id">Teacher ID:</label>
    <input type="number" id="teacher_id" name="teacher_id">
    <span id="teacher_id_error" style="color: red; font-size: 0.9em;"></span>

    <label for="study_duration">Study Duration (hours):</label>
    <input type="number" id="study_duration" name="study_duration">
    <span id="study_duration_error" style="color: red; font-size: 0.9em;"></span>

    <label for="level">Level:</label>
    <select id="level" name="level">
        <option value="">Select a level</option>
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediate</option>
        <option value="Advanced">Advanced</option>
    </select>
    <span id="level_error" style="color: red; font-size: 0.9em;"></span>

    <button type="submit">Save</button>
    <button type="reset">Reset</button>
</form>

    </div>
    <script src="/Gestion des cours/views/addcourse.js"></script>
</body>


</html>
