<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminTables extends Component
{
    
    public function render()
    {
        $tables = DB::select('SHOW TABLES
                                        WHERE NOT 
                                        Tables_in_coyote="failed_jobs"
                                        AND NOT
                                        Tables_in_coyote="migrations"
                                        AND NOT
                                        Tables_in_coyote="password_resets"
                                        AND NOT
                                        Tables_in_coyote="personal_access_tokens"
                                        AND NOT
                                        Tables_in_coyote="sessions"
                                        ');
        $db = DB::getDatabaseName();
        return view('livewire.admin.admin-tables' , compact('tables' , 'db'));
    }
}
