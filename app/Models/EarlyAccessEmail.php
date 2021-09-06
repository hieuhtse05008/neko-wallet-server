<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class EarlyAccessEmail extends Model
{
    public $table = 'early_access_emails';
    protected $fillable = [
        'email',
        'ref',
        'code'
    ];
}
