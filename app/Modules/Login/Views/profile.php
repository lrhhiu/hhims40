<?php
/*
 * Hospital Health Information Management System (HHIMS) v4.0
 * Copyright (c) 2025 Health Information Unit - Lady Ridgeway Hospital for Children
 * GNU General Public License (GPL) version 3
 * 
 * Created Date: 30-May-2025, 3:17:37 am
 * Authors: Dr. Uditha Perera - Consultant in Health Informatics
 *          Dr. Rizan Hafrath - Medical Officer in Health Informatics
 *          Dr. Malinda Wijeratne - Medical Officer in Health Informatics
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
    <!-- User Profile Page -->
    <h2>User Profile</h2>
    <a href="<?= site_url('login/logout') ?>" class="btn btn-danger" style="margin-top:20px;">Logout</a>
    <table>
        <tr><th>Name:</th><td><?= esc($user['Title'] . ' ' . $user['FirstName'] . ' ' . $user['OtherName']) ?></td></tr>
        <tr><th>Username:</th><td><?= esc($user['Username']) ?></td></tr>
        <tr><th>Email:</th><td><?= esc($user['EmailAddress']) ?></td></tr>
        <tr><th>NIC:</th><td><?= esc($user['NIC']) ?></td></tr>
        <tr><th>Date of Birth:</th><td><?= esc($user['DateOfBirth']) ?></td></tr>
        <tr><th>Gender:</th><td><?= esc($user['Gender']) ?></td></tr>
        <tr><th>Designation:</th><td><?= esc($user['Designation']) ?></td></tr>
        <tr><th>Telephone:</th><td><?= esc($user['Telephone']) ?></td></tr>
        <tr><th>Status:</th><td><?= esc($user['Status']) ?></td></tr>
    </table>