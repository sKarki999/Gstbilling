<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GstBill extends Model {
    use HasFactory;

    // assign table
    protected $table = "gst_bills";

    //primary key
    protected $primaryKey = "id";

    protected $guarded = [];

    public function party() {
        return $this->belongsTo(Party::class);
    }
}
