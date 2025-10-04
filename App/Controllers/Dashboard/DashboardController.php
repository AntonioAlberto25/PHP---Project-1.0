<?php

namespace App\Controllers\Dashboard;

use Core\Database;

class DashboardController
{

    public function __invoke()
    {

        return view("/dashboard");
        
    }

}