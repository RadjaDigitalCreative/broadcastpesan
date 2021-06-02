<?php

namespace App\Imports;

use App\Models\Waweb;
use App\Models\Database;
use Maatwebsite\Excel\Concerns\ToModel;



class WaImport implements ToModel
{
     protected $id;
     function __construct($id) {
            $this->id = $id;
     }
    public function model(array $row)
    {
        return new Waweb([
            'name'    => $row['1'], 
            'number'    => $row['2'], 
            'text'    => $row['3'], 
            'id_data'    => $this->id,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
    }
    
}
