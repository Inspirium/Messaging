<?php

namespace Inspirium\Messaging\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Inspirium\Messaging\Models\Message
 *
 * @mixin \Eloquent
 * @property-read \Inspirium\HumanResources\Models\Employee $sender
 * @property-read \Inspirium\Messaging\Models\Thread $thread
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Messaging\Models\Message onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Messaging\Models\Message withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Messaging\Models\Message withoutTrashed()
 * @property int $id
 * @property int $sender_id
 * @property int $thread_id
 * @property string $message
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Message whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Message whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Message whereThreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Message whereUpdatedAt($value)
 */
class Message extends Model {

	use SoftDeletes;

	protected $table = 'messages';

	protected $fillable = ['message', 'sender_id', 'thread_id'];

	protected $with = ['sender'];

	public function sender() {
		return $this->belongsTo('Inspirium\HumanResources\Models\Employee', 'sender_id');
	}

	public function thread() {
		return $this->belongsTo('Inspirium\Messaging\Models\Thread', 'thread_id');
	}
}