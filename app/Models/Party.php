<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model {
    use HasFactory;

    // assign table
    protected $table = "parties";

    //primary key
    protected $primaryKey = "id";

    //fillable
    // protected $fillable = [
    //     "fullname",
    //     "address"
    // ];

    protected $guarded = [];

    public function gstBills() {
        return $this->hasMany(GstBill::class);
    }
}
