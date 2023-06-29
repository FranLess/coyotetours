<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Tables extends Component
{

    public function render()
    {
        $tables = $this->getTables();
        return view('livewire.admin.tables' , compact('tables'));
    }

    public function getTables()
    {
        $tables = DB::select('SHOW TABLES 
        WHERE NOT
        Tables_in_coyote = "failed_jobs"
        AND NOT
        Tables_in_coyote = "migrations"
        AND NOT
        Tables_in_coyote = "password_resets"
        AND NOT
        Tables_in_coyote = "personal_access_tokens"
        AND NOT
        Tables_in_coyote = "sessions"
        AND NOT
        Tables_in_coyote = "users"');
        return $tables;
    }
}
