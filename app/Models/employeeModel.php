<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employeeModel extends Model
{
    protected $table = "tbl_employee";
    protected $primaryKey = 'employee_id'; 
    public $timestamps = false;

    // Add the fillable attributes for mass assignment
    protected $fillable = [
        'birthdate',
        'gender',
        'user_id',
        'image',
        'employee_fname',
        'employee_lname',
        'employee_mname',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'postal_code',
        'country',
        'contact1'
    ];

    // Relationship to the user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
