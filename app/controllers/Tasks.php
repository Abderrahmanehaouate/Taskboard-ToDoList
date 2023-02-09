<?php

class Tasks extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->taskModel = $this->model('Task');
    }

    public function index()
    {
        // Get task
        $tasks = $this->taskModel->getTasks();
        $data = [
            'tasks' => $tasks,
        ];
        $this->view('tasks/index', $data);
    }

    public function addTask()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'deadline' => trim($_POST['deadline']),
                'description' => trim($_POST['description']),
            ];

            $errors = [
                'deadline_err' => '',
                'description_err' => '',
            ];

            if (empty($data['deadline'])) {
                $errors['deadline_err'] = 'Please enter deadline of task';
            }
            if (empty($data['description'])) {
                $errors['description_err'] = 'Please enter description of task';
            }

            if (
                empty($errors['deadline_err']) &&
                empty($errors['description_err'])
            ) {
                //Validated
                if ($this->taskModel->addTask($data)) {
                    echo json_encode([
                        'message' => 'Task added successfully',
                        'error' => false,
                    ]);
                } else {
                    echo json_encode([
                        'message' => 'Ops somethind went wrong!',
                        'error' => true,
                    ]);
                }
            } else {
                echo json_encode([
                    'message' => 'Ops somethind went wrong!',
                    'error' => true,
                    'errors' => $errors,
                ]);
            }
        }
    }

    public function addMultipTasks()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            for ($i = 0; $i < count($_POST['deadline']); $i++) {
                $data = [
                    'user_id' => $_SESSION['user_id'],
                    'deadline' => trim($_POST['deadline'][$i]),
                    'description' => trim($_POST['description'][$i]),
                ];
                $info = $this->taskModel->addMultipTask($data);
            }
            if ($info) {
                echo json_encode([
                    'message' => 'Task added successfully',
                    'error' => false,
                ]);
            } else {
                echo json_encode([
                    'message' => 'Ops somethind went wrong!',
                    'error' => true,
                ]);
            }
        }
    }

    public function getTasks()
    {
        $tasks = $this->taskModel->getTasks();
        echo json_encode($tasks);
    }

    public function deleteTask()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $id = trim($_POST['id']);

            if ($this->taskModel->delete($id)) {
                echo json_encode([
                    'message' => 'Task deleted successfully',
                    'error' => false,
                ]);
            } else {
                echo json_encode([
                    'message' => 'Ops somethind went wrong!',
                    'error' => true,
                ]);
            }
        }
    }

    public function updateTask()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => trim($_POST['id']),
                'deadline' => trim($_POST['deadline']),
                'description' => trim($_POST['description']),
                'status' => trim($_POST['status']),
            ];

            $errors = [
                'deadline_err' => '',
                'description_err' => '',
            ];

            if (empty($data['deadline'])) {
                $errors['deadline_err'] = 'Please enter deadline of task';
            }
            if (empty($data['description'])) {
                $errors['description_err'] = 'Please enter description of task';
            }

            if (
                empty($errors['deadline_err']) &&
                empty($errors['description_err'])
            ) {
                //Validated
                if ($this->taskModel->updateTask($data)) {
                    echo json_encode([
                        'message' => 'Task updated successfully',
                        'error' => false,
                    ]);
                } else {
                    echo json_encode([
                        'message' => 'Ops somethind went wrong!',
                        'error' => true,
                    ]);
                }
            } else {
                echo json_encode([
                    'message' => 'Ops somethind went wrong!',
                    'error' => true,
                    'errors' => $errors,
                ]);
            }
        }
    }
}
