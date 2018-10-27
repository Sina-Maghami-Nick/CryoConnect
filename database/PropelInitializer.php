<?php

require_once '/path/to/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init(__DIR__ . './generated-conf/config.php');

// Add the generated 'classes' directory to the include path
set_include_path(__DIR__ . './generated-classes"' . PATH_SEPARATOR . get_include_path());

