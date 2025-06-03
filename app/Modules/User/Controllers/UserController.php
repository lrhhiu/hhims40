<?php
/*
 * Hospital Health Information Management System (HHIMS) v4.0
 * Copyright (c) 2024 Health Information Unit - Lady Ridgeway Hospital for Children
 * GNU General Public License (GPL) version 3
 * 
 * This file is part of HHIMS. It is now part of the User module.
 * 
 * You should have received a copy of the GNU Affero General Public License along
 * with this program. If not, see <http://www.gnu.org/licenses/>
 * 
 */

namespace App\Modules\User\Controllers;

use App\Controllers\BaseController; // Assuming BaseController is in App\Controllers

class UserController extends BaseController
{
    public function profile()
    {
        if (!session()->has('uid')) {
            return redirect()->to('/auth');
        }
        $userModel = $this->load_model('UserModel'); // Changed to load_model
        $user = $userModel->find(session()->get('uid'));
        if (!$user) {
            // User not found, perhaps session is stale or user deleted
            session()->destroy(); // Clear potentially invalid session
            return redirect()->to('/auth')->with('error', 'User not found. Please login again.');
        }
        // The load_view helper will look for 'profile.php' in 'app/Modules/User/Views/'
        return $this->load_view('profile', ['user' => $user]); // Changed to load_view
    }
}
?>
