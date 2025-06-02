<?php
/*
 * Hospital Health Information Management System (HHIMS) v4.0
 * Copyright (c) 2024 Health Information Unit - Lady Ridgeway Hospital for Children
 * GNU General Public License (GPL) version 3
 * 
 * Created Date: 28-Sep-2024, 6:21:31 am
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
?>
<form method="post" action="/login/reset">
    <input type="hidden" name="token" value="<?php echo $token ?>">
    
    <label for="new_password">New Password</label>
    <input type="password" name="new_password" id="new_password" required>
    <input type="checkbox" onclick="togglePassword()"> Show Password

    <button type="submit">Reset Password</button>
</form>

<script>
function togglePassword() {
    var passwordField = document.getElementById("new_password");
    passwordField.type = passwordField.type === "password" ? "text" : "password";
}
</script>
