<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class HrController extends Controller
{
    public function actionIndex()
    {
        $this->goToLoginIfGuest();

        $mentors = $this->getMentors();


        return $this->render('index', [
            'mentors' => $mentors
        ]);
    }

    private function goToLoginIfGuest()
    {
        $id = Yii::$app->user->id;
        if($id ==null) {
            $this->redirect(['site/login']);
        }
    }

    public function actionMentor($id)
    {
        $this->goToLoginIfGuest();

        $mentor = $this->getMentorInfo($id);
        $mentor_students = $this->getMentorStudents($id);
        $students = $this->getStudents();

        return $this->render('mentor', [
            'mentors' => $mentor,
            'students' => $mentor_students,
            'allstudents' =>$students
        ]);

    }

    public function actionStudentomentor($id_mentor, $id_student)
    {
        $this->goToLoginIfGuest();

        $result = $this->addNewStudentToMentor($id_mentor, $id_student);

    }


    public function getMentors()
    {
        return Yii::$app->db->createCommand('SELECT * FROM mentors')->queryAll();
    }

    public function getStudents()
    {
        return Yii::$app->db->createCommand('SELECT * FROM students')->queryAll();
    }

    public function getMentorInfo($id)
    {
        return Yii::$app->db->createCommand('SELECT * FROM mentors where id = :id')
            ->bindValue(':id', $id)
            ->queryAll();
    }
    public function getMentorStudents($id)
    {
        return Yii::$app->db->createCommand('select * from students s join mentor_student ms on s.id = ms.student_id where ms.mentor_id = :id')
            ->bindValue(':id', $id)
            ->queryAll();
    }

    public function addNewStudentToMentor($mentor_id, $student_id)
    {
        $this->goToLoginIfGuest();

        $newId = Yii::$app->db->createCommand('select max(id) from mentor_student')->queryScalar();
        var_dump($newId);
        $result = Yii::$app->db->createCommand('INSERT INTO mentor_student (id, mentor_id, student_id) VALUES (:id, :mentor, :student);')
            ->bindValue(':mentor', $mentor_id)
            ->bindValue(':student', $student_id)
            ->bindValue(':id', $newId+1)
            ->execute();
        var_dump($result);
        return $result;
    }



}