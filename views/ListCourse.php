<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>List of Courses</title>
    <style>
        /* styles.css */

        header {
            background-color: #e26e0e;
            padding: 15px;
        }

        body {
            background-image: linear-gradient(to right, hsl(215, 92%, 15%, 0.8), hsl(215, 92%, 15%, 0.7)), url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        h2 a:hover {
            text-decoration: underline;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
            color: #f2f2f2;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: hsl(215, 92%, 15%);
            font-weight: bold;
        }

        tr:hover {
            background-color: #e26e0e;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #03224c;
        }

        a.button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin: 10px 5px;
        }

        a.button:hover {
            background-color: #03224c;
        }
    </style>
</head>
<body>
    <?php
    require_once 'C:\xampp\htdocs\Gestion des cours\controller\CourseController.php';

    // Instantiate the controller
    $courseController = new CourseController();
    $tab = $courseController->listCourse(); // Fetch the list of courses

    // Fetch courses with resource count
    $coursesWithResourceCount = $courseController->getCourseWithResourceCount();
    ?>

    <center>
        <header>
            <h1>My Courses</h1>
        </header>
        <h2>
            <a href="AddCourse.php">Add Course</a>
        </h2>
    </center>

    <!-- Navigation Bar -->
    <center>
        <a href="ListRessource.php" class="button">Resource List</a>
        <a href="jointure.php" class="button">Recherche</a>
    </center>

    <!-- Resources List Table -->
    <h2>Course List</h2>
    <table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Level</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($tab)): ?>
            <?php foreach ($tab as $course): ?>
                <tr>
                    <td><?= $course['id']; ?></td>
                    <td><?= $course['title']; ?></td>
                    <td><?= $course['description']; ?></td>
                    <td><?= $course['price']; ?> USD</td>
                    <td><?= $course['study_duration']; ?> hours</td>
                    <td><?= $course['level']; ?></td>
                    <td align="center">
                        <form method="POST" action="UpdateCourse.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value="<?= $course['id']; ?>" name="id">
                        </form>
                    </td>
                    <td>
                        <a href="DeleteCourse.php?id=<?= $course['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align: center;">No courses found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- Courses with Resources Count Table -->
    <h2>Courses with Ressource Count</h2>
    <table>
        <thead>
            <tr>
                <th>Course Title</th>
                <th>Ressource Count</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($coursesWithResourceCount)): ?>
                <?php foreach ($coursesWithResourceCount as $course): ?>
                    <tr>
                        <td><?= htmlspecialchars($course['title']); ?></td>
                        <td><?= $course['resource_count']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" style="text-align: center;">No courses with resources found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
