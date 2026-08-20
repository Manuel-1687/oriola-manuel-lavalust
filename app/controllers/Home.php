<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Home extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'MANUEL STUDENT DESK',
            'student_name' => $_SESSION['student_name'] ?? '',
            'student_data' => $_SESSION['student_data'] ?? []
        ];

        $this->call->view('home', $data);
    }

    public function profile()
    {
        if (empty($_SESSION['student_name'])) {
            header('Location: /');
            exit;
        }

        $data = [
            'title' => 'Student Profile',
            'student_name' => $_SESSION['student_name'],
            'student_data' => $_SESSION['student_data'] ?? [
                'student_id' => 'MCC2024-00268',
                'course' => 'BS Information Technology',
                'year_level' => '3rd Year',
                'section' => '3F4',
                'email' => 'Oriolapardz@gmail.com',
                'address' => 'Ibaba, East, Calapan City',
                'contact' => '09120763768'
            ]
        ];

        $this->call->view('home', $data);
    }
}
