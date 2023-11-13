<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratCuti extends Model
{
    use HasFactory;

    protected $table = 'surat_cutis';

    protected $primaryKey = 'sc_id';
}
