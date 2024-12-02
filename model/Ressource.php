<?php
class Ressource {
    private $id;
    private $course_id;
    private $type;
    private $url;
    private $created_at;

    // Constructor to initialize the Ressource object
    public function __construct($course_id, $type, $url, $id = null, $created_at = null) {
        $this->id = $id;
        $this->course_id = $course_id;
        $this->type = $type;
        $this->url = $url;
        $this->created_at = $created_at;
    }

    // Getters and setters for each property
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCourseId() {
        return $this->course_id;
    }

    public function setCourseId($course_id) {
        $this->course_id = $course_id;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
}
?>
