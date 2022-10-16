<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Keuangan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the Keuangan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query)
    {
        if (request('search')) {
           return $query->where('name','like','%'.request('search').'%');
        }
    }

    public function scopeFilter($query)
    {
        $date1 = request('tanggal1')->format('Y-m-d');
        $date2 = request('tanggal2')->format('Y-m-d');
        if ($date1 && $date2) {
            return $query->whereDate('created_at', '>=', $date1)
            ->whereDate('created_at', '<=', $date2)
            ->get();
        }
    }
}
