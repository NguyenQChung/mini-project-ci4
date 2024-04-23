<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        return view('examples/login');
    }
    public function do_Login()
    {
        $userModel = new UsersModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($email && $password) {
            // Tìm người dùng dựa trên email
            $result = $userModel->where('email', $email)->first();

            if ($result) {
                // So sánh mật khẩu
                if (password_verify($password, $result->password)) {
                    // Khởi tạo session
                    $this->session->set('user', $result);
                    // Lấy ID của người dùng từ đối tượng $result
                    $userId = $result->id;
                    session()->set('updateId', $userId);
                    return redirect()->to('/Home');
                } else {
                    echo 'Sai tài khoản hoặc mật khẩu!';
                }
            } else {
                echo 'Sai tài khoản hoặc mật khẩu!';
            }
        } else {
            echo 'Vui lòng nhập email và mật khẩu.';
        }
    }
}
