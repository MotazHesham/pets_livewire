<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'appointments';

    public const STATUS_SELECT = [
        'pending' => 'pending',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const SIZE_SELECT = [
        'small'  => 'Small',
        'medium' => 'Medium',
        'large'  => 'Large',
    ];

    protected $casts = [
        'reminded'              => 'boolean',
        'is_counted_as_loyalty' => 'boolean',
        'is_it_loyalty_appoint' => 'boolean',
    ];

    protected $fillable = [
        'client_id',
        'pet_id',
        'employee_id',
        'package_id',
        'date',
        'time',
        'status',
        'comment',
        'size',
        'price',
        'additional_info',
    ];

    public $filterable = [
        'id',
        'client.address',
        'pet.name',
        'employee.name',
        'package.name',
        'addons.name',
        'date',
        'time',
        'status',
        'size',
        'price',
    ];

    public $orderable = [
        'id',
        'client.address',
        'pet.name',
        'employee.name',
        'package.name',
        'date',
        'time',
        'status',
        'size',
        'price',
        'is_it_loyalty_appoint',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function addons()
    {
        return $this->belongsToMany(Addon::class);
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    public function getSizeLabelAttribute($value)
    {
        return static::SIZE_SELECT[$this->size] ?? null;
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}
