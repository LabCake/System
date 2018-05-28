<?php

/**
 * Example file on how to use the System library
 */

include_once "src/System.php";

\LabCake\System::is_cli();
\LabCake\System::is_https();
\LabCake\System::is_windows();
\LabCake\System::is_unix();

\LabCake\System::get_os();