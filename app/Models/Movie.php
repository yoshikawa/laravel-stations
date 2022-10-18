<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Http\Middleware\Utils;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'image_url',
        'published_year',
        'description',
        'is_showing'
    ];


    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public static function search($request)
    {
        $util = new Utils();

        $escaped = $util->sqlEscape($request->keyword);
        $wordListToSearch = $util->preparationToAndSearch($escaped);
        $query = Movie::select('*');

        foreach ($wordListToSearch as $word) {
            $query->where(function ($query) use ($word) {
                $query->where('title', 'like', "%$word%")
                    ->orWhere('description', 'like', "%$word%");
            });
        }

        if ($request->is_showing === '1') {
            $query->where('is_showing', '=', 1);
        } else if ($request->is_showing === '0') {
            $query->where('is_showing', '=', 0);
        }

        return $query->get();
    }
}
