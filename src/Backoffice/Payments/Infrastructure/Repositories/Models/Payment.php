<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Payments\Infrastructure\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

use Paycomet\Backoffice\Courses\Infrastructure\Repositories\Models\Course;
use Paycomet\Backoffice\User\Infrastructure\Repositories\Models\User;

final class Payment extends Model
{
    public $incrementing = false;

    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'payment_method',
        'quantity',
        'amount',
        'currency',
        'user_id',
        'course_id',
    ];


    /**
     * Get the user that owns the Payment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the Payment.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
