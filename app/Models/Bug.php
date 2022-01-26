<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $title
 * @property string $description
 * @property integer $type_id
 * @property string $status
 * @property integer $id
 * @property integer $user_id
 * @property integer $status_id
 * @method static where(string $column, string $operator, integer $id)
 * @method create(array $all)
 * @method find(Bug $bug)
 */

class Bug extends Model
{
    use HasFactory;

    protected $table = 'bugs';

    protected $fillable = [
      'title',
      'description',
      'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
