<?php
/*
 * Hospital Health Information Management System (HHIMS) v4.0
 * Copyright (c) 2024 Health Information Unit - Lady Ridgeway Hospital for Children
 * GNU General Public License (GPL) version 3
 * 
 * Created Date: 29-Sep-2024, 8:21:58 pm
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

 if (!function_exists('get_module_namespace')) {
    /**
     * Detects the namespace for the current module.
     *
     * @param array $trace The backtrace from debug_backtrace.
     * @return string The detected module namespace.
     */
    function get_module_namespace($trace)
    {
        // Get the caller's class from the backtrace
        $callerClass = $trace[1]['class'];

        // Get the module's namespace parts (e.g., App\Modules\Login\Controllers\LoginController)
        $namespaceParts = explode('\\', $callerClass);

        // Detect the module name by getting the second part (after App\Modules)
        if (isset($namespaceParts[2]) && strtolower($namespaceParts[1]) === 'modules') {
            $moduleName = $namespaceParts[2];
        } else {
            // If not part of a module, fall back to a default namespace
            $moduleName = 'App';
        }

        // Construct the full module namespace
        return 'App\Modules\\' . $moduleName;
    }
}


if (!function_exists('load_view')) {
    /**
     * Loads a view from the current module.
     *
     * @param string $view The view name.
     * @param array|null $data The data to pass to the view.
     * @param array|null $options Additional options for the view.
     * @return mixed The view output.
     */
    function load_view($view, $data = null, $options = null)
    {
        // Get the caller's namespace to detect the current module
        $trace = debug_backtrace();

        // Get the full module namespace
        $moduleNamespace = get_module_namespace($trace);

        // Construct the full path for the view based on the module namespace
        $viewPath = $moduleNamespace . '\Views\\' . $view;

        // Call the default CI4 view() function with the constructed path
        return view($viewPath, $data, $options);
    }
}

if (!function_exists('load_model')) {
    /**
     * Loads a model from the current module.
     *
     * @param string $model The model name.
     * @param string|null $alias An optional alias to refer to the model.
     * @return object The model instance.
     */
    function load_model($model, $alias = null)
    {
        // Get the caller's namespace to detect the current module
        $trace = debug_backtrace();

        // Get the full module namespace
        $moduleNamespace = get_module_namespace($trace);

        // Construct the full model namespace (e.g., App\Modules\Login\Models\Mopd)
        $modelNamespace = $moduleNamespace . '\Models\\' . ucfirst($model);

        // Load the model instance using CI4's model() function
        $modelInstance = model($modelNamespace);

        // If no alias is provided, use the model name as the alias
        if (is_null($alias)) {
            $alias = $model;
        }

        // Assign the model instance to the calling controller/object
        $trace[1]['object']->$alias = $modelInstance;

        return $modelInstance;
    }
}