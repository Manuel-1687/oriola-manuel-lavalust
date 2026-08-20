<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentAccessMiddleware
{
    public function handle($next)
    {
        if (empty($_SESSION['student_name'])) {
            header('Location: /');
            exit;
        }

        return $next();
    }
}
