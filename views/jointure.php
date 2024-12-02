<?php
require_once "../controller/CourseController.php";
require_once "../controller/RessourceController.php";

// Instantiate controllers
$courseC = new CourseController();
$ressourceC = new RessourceController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    
    // Fetch resources for the selected course ID
    $resources = $ressourceC->getResourcesByCourse($course_id);  // Adjust the method as needed
}

// Fetch all courses
$courses = $courseC->getAllCourses();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Resources by Course</title>
    <style>
        body {
            background-image: linear-gradient(to right, hsl(215, 92%, 15%, 0.8), hsl(215, 92%, 15%, 0.7)), url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #e26e0e;
            padding: 15px;
            text-align: center;
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

        select, input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #03224c;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #fb470d;
        }

        .resources-list {
            margin-top: 30px;
        }

        .resources-list li {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        a {
            color: #fb470d;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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
    <h1><a href="ListRessource.php">Back to Ressource List</a></h1>
</header>

<div class="container">
    <h1>Search Resources by Course</h1>
    <form action="" method="POST">
        <label for="course_id">Select a Course:</label>
        <select name="course_id" id="course_id">
            <?php
            foreach ($courses as $course) {
                echo '<option value="' . $course['id'] . '">' . $course['title'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Search" name="search">
    </form>

    <?php if (isset($resources)) { ?>
        <div class="resources-list">
            <h2>Resources for the selected course:</h2>
            <ul>
                <?php foreach ($resources as $resource) { ?>
                    <li>
                        <strong>Resource Type:</strong> <?= $resource['type'] ?><br>
                        <strong>Resource URL:</strong> <a href="<?= $resource['url'] ?>" target="_blank"><?= $resource['url'] ?></a><br>
                        <strong>Created At:</strong> <?= $resource['created_at'] ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</div>

</body>
</html>
