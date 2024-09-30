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
if (!function_exists('load_view')) {
    /**
     * Load a view from the current module
     * 
     * @param string $view The name of the view file (relative to the module's Views folder)
     * @param array|null $data Data to pass to the view
     * @param array|null $options Additional options for rendering the view
     * @return string Rendered view
     */
    function load_view($view, $data = null, $options = null)
    {
        // Get the caller's namespace to detect the current module
        $trace = debug_backtrace();
        $callerClass = $trace[1]['class'];

        // Get the module's namespace (e.g., App\Modules\Login\Controllers\LoginController)
        $namespaceParts = explode('\\', $callerClass);
        
        // Detect the module name by getting the second part (after App\Modules)
        if (isset($namespaceParts[2]) && strtolower($namespaceParts[1]) === 'modules') {
            $moduleName = $namespaceParts[2];
        } else {
            // If not part of a module, fall back to a default namespace
            $moduleName = 'App';
        }

        // Construct the full path for the view based on the module namespace
        $viewPath = 'App\Modules\\' . $moduleName . '\Views\\' . $view;

        // Call the default CI4 view() function with the constructed path
        return view($viewPath, $data, $options);
    }

    if (!function_exists('load_model')) {
        /**
         * Helper to load a model from the current module.
         *
         * @param string $modelName The name of the model.
         * @param bool $shared Whether the model should be a shared instance (singleton).
         * @return object The loaded model instance.
         */
        function load_model($modelName, $shared = true)
        {
            // Get the current module namespace
            $moduleNamespace = config('Modules')->getModuleNamespace();
    
            // Build the model's full namespace
            $modelNamespace = $moduleNamespace . '\\Models\\' . $modelName;
    
            // Load the model using the appropriate CodeIgniter model loading mechanism
            return model($modelNamespace, $shared);
        }
    }
    
}