<?php
/*
 * Hospital Health Information Management System (HHIMS) v4.0
 * Copyright (c) 2025 Health Information Unit - Lady Ridgeway Hospital for Children
 * GNU General Public License (GPL) version 3
 * 
 * Created Date: 30-May-2025, 9:49:22 pm
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


if (!function_exists('get_config_item')) {
    function get_config_item($key)
    {
        static $config = null;
        if ($config === null) {
            $db = \Config\Database::connect();
            $builder = $db->table('default_config');
            $rows = $builder->get()->getResultArray();
            $config = [];
            foreach ($rows as $row) {
                $config[$row['CfgItem']] = $row['CfgValue'];
            }
        }
        return $config[$key] ?? null;
    }
}