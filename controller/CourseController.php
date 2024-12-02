<?php
include('../model/Course.php');
require_once '../db.php';
class CourseController
{
    
    public function courseExists($courseId) {
        // Assuming you have a Course model and database connection
        $db = config::getConnexion();
        $sql = "SELECT COUNT(*) FROM course WHERE id = :course_id";
        $query = $db->prepare($sql);
        $query->execute(['course_id' => $courseId]);
        $result = $query->fetchColumn();
        return $result > 0;  // Return true if the course exists, otherwise false
    }




   //create
   function addcourse($course)
{   var_dump($course);
    $sql = "INSERT INTO course
    VALUES (NULL, :title,:description, :price, :teacher_id, :study_duration, :level, :created_at, :updated_at)";
    
    $db = config::getConnexion();
    try {
       $query = $db->prepare($sql);
       $query->execute([
           'title' => $course->getTitle(),
           'description' => $course->getDescription(),
           'price' => $course->getPrice(),
           'teacher_id' => $course->getTeacherId(),
           'study_duration' => $course->getStudyDuration(),
           'level' => $course->getLevel(),
           'created_at' => (new DateTime())->format('Y-m-d H:i:s'), // Current timestamp
           'updated_at' => (new DateTime())->format('Y-m-d H:i:s')  // Current timestamp
       ]);
       
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

//listcourse
public function listCourse()
{
    $sql = "SELECT * FROM course";
    $db = config::getConnexion();

    try {
        $course = $db->query($sql);
        return $course;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}

//modification of course to the professors
public function updateCourse($course, $id)
{
    $sql = "UPDATE course SET 
                title = :title,
                description = :description,
                price = :price,
                teacher_id = :teacher_id,
                study_duration = :study_duration,
                level = :level
            WHERE id = :id";
    
    $db = config::getConnexion();
    
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'title' => $course->getTitle(),
            'description' => $course->getDescription(),
            'price' => $course->getPrice(),
            'teacher_id' => $course->getTeacherId(),
            'study_duration' => $course->getStudyDuration(),
            'level' => $course->getLevel(),
            'id' => $id
        ]);
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}


//delete course



public function deleteCourse($id)
{
    $sql = "DELETE FROM course WHERE id = :id";
    $db = config::getConnexion(); 
    $req = $db->prepare($sql);
    $req->bindvalue(':id',$id);
    try{
        $req->execute();
    }
    catch (Exception $e) {
        echo 'Error: ' . $e->getMessage(); 
    }
}
function showCourse($id)
{
    $sql = "SELECT * FROM course WHERE id = $id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();

        $course = $query->fetch();
        return $course;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
public function getAllCourses() {
    $sql = "SELECT * FROM course ";
    $db = config::getConnexion();
    $query = $db->prepare($sql);
    $query->execute();
    $course= $query->fetchAll();
    return $course;
      // Returns an array of courses
}
public function getCourseWithResourceCount() {
    $db = config::getConnexion();
    $sql = "SELECT course.*, COUNT(ressource.id) AS resource_count
            FROM course
            LEFT JOIN ressource ON course.id = ressource.course_id
            GROUP BY course.id";
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

}




