<?php 
if( !session_id() ) session_start();
require_once PROJECT_URL . '/app/core/App.php';
require_once PROJECT_URL . '/app/core/BaseController.php';
require_once PROJECT_URL . '/app/models/BaseModel.php';
require_once PROJECT_URL . '/app/core/Database.php';
require_once PROJECT_URL . '/app/core/Flasher.php';

require_once PROJECT_URL . '/app/config/config.php';

$app = new App;



