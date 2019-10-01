<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Log extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'action', 'message'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    static function add($action, $message, $user_id = null)
    {
        $log = new Log([
            'user_id' => $user_id ? : Auth::user()->getAuthIdentifier(),
            'action'  => $action,
            'message' => $message
        ]);
        $log->save();
    }
}
