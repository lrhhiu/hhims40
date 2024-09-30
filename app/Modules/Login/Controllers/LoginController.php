<?php
/*
 * Hospital Health Information Management System (HHIMS) v4.0
 * Copyright (c) 2024 Health Information Unit - Lady Ridgeway Hospital for Children
 * GNU General Public License (GPL) version 3
 * 
 * Created Date: 28-Sep-2024, 6:15:30 am
 * Authors: Dr. Uditha Perera - Consultant in Health Informatics
 *          Dr. Rizan Hafrath - Medical Officer in Health Informatics
 * Email: lrh.health.gov.lk@gmail.com
 * ------------------------------------------------------------------------------------------------------------------
 * Permission is hereby granted to use, modify, and distribute this software for personal and non-commercial purposes,
 * provided that the original authors are credited. Commercial use, including selling, licensing, or distributing
 * the software for a fee, is strictly prohibited without prior written consent from the original authors.
 * 
 * This program is free software and is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * 
 * You should have received a copy of the GNU Affero General Public License along
 * with this program. If not, see <http://www.gnu.org/licenses/>
 * 
 */

namespace App\Modules\Login\Controllers;

use App\Controllers\BaseController;
use App\Modules\Login\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        // Load login form
        return load_view('login_form');
    }

    public function authenticate()
    {
        $user_model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        // Fetch user by username
        $user = $user_model->where('username', $username)->first();

        if ($user && password_verify($password, $user['Password'])) {
            // Password matches, set user session
            $this->setUserSession($user);
            return redirect()->to('/dashboard');  // Redirect to user dashboard
        } else {
            // Invalid credentials
            return redirect()->back()->with('error', 'Invalid login credentials');
        }
    }

    public function forgotPasswordForm()
    {
        return load_view('forgot_password_form');
    }

    public function sendResetLink()
    {
        $user_model = new UserModel();
        $email = $this->request->getPost('email');
        
        $user = $user_model->where('email_address', $email)->first();
        if ($user) {
            $reset_token = bin2hex(random_bytes(50));  // Generate token
            $user_model->update($user['UID'], ['ResetToken' => $reset_token]);
            
            // Send email with reset link (this part can be expanded based on your email configuration)
            // Example reset link: https://your-site.com/login/reset/{token}
            return redirect()->back()->with('success', 'Password reset link has been sent to your email');
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    public function resetPasswordForm($token)
    {
        // Load reset password form with the token
        return view('reset_password_form', ['token' => $token]);
    }

    public function resetPassword()
    {
        $user_model = new UserModel();
        $token = $this->request->getPost('token');
        $new_password = $this->request->getPost('new_password');
        
        $user = $user_model->where('ResetToken', $token)->first();

        if ($user) {
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
            $user_model->update($user['UID'], ['Password' => $hashed_password, 'reset_token' => null]);
            return redirect()->to('/login')->with('success', 'Password has been reset');
        } else {
            return redirect()->back()->with('error', 'Invalid reset token');
        }
    }

    private function setUserSession($user)
    {
        $data = [
            'uid' => $user['UID'],
            'username' => $user['Username'],
            'isLoggedIn' => true
        ];
        session()->set($data);
        return true;
    }
}
