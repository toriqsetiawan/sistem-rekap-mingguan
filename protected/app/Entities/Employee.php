<?php

namespace App\Entities;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // use SoftDeletes;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    // protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'alamat', 'phone', 'golongan'];

    /**
     * Handling relation tables.
     *
     */
    public function report()
    {
        return $this->hasMany('App\Entities\Report')->where('type', 'setor');
    }

    public function bon()
    {
        return $this->hasOne('App\Entities\Report')->where('type', 'bon');
    }

    public function reportPrint()
    {
        return $this->hasOne('App\Entities\ReportGlobal');
    }

    public function log()
    {
        return $this->hasOne('App\Entities\EmployeeLog');
    }

    public function lastTransaction()
    {
        return $this->hasOne('App\Entities\EmployeeLog');
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucwords($value);
    }

    public function setAlamatAttribute($value)
    {
        $this->attributes['alamat'] = ucwords($value);
    }

}
