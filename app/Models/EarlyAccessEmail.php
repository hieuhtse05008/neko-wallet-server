<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperEarlyAccessEmail
 */
class EarlyAccessEmail extends Model
{
    public $table = 'early_access_emails';
    protected $fillable = [
        'email',
        'ref',
        'code'
    ];
}
