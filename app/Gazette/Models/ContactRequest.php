<?php

namespace App\Gazette\Models;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
	protected $fillable = ['name', 'email', 'phone_number', 'message'];
}
