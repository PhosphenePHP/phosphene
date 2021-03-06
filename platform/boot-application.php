<?php

/**
 * Copyright (c) 2016 RhubarbPHP.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

include_once(__DIR__ . '/boot-rhubarb.php');

/** @var \Rhubarb\Crown\Application $application */
if ($appClass = getenv('rhubarb_app')) {
    $application = new $appClass();
} elseif (file_exists(APPLICATION_ROOT_DIR.'/settings/app.config.php')) {
    include_once APPLICATION_ROOT_DIR.'/settings/app.config.php';
}

if (isset($application)) {
    $application->initialiseModules();
} else {
    // We need an application object for dependency injection and the developer hasn't given us one
    // Create an empty application as a back stop.
    $application = new \Rhubarb\Crown\Application();
}
