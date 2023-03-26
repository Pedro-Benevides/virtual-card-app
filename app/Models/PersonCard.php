<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PersonCard
 * 
 * @property int $id
 * @property string $person_name
 * @property string|null $linkedin_url
 * @property string|null $github_url
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class PersonCard extends Model
{
	use SoftDeletes;

	protected $table = 'person_card';

	const ID = 'id';
	const PERSON_NAME = 'person_name';
	const LINKEDIN_URL = 'linkedin_url';
	const GITHUB_URL = 'github_url';
	const UUID = 'uuid';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';

	protected $casts = [
		self::ID => 'int',
		self::CREATED_AT => 'datetime',
		self::UPDATED_AT => 'datetime'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT,
		self::DELETED_AT
	];

	protected $hidden = [
		self::CREATED_AT,
		self::UPDATED_AT,
		self::DELETED_AT
	];

	protected $fillable = [
		self::PERSON_NAME,
		self::LINKEDIN_URL,
		self::GITHUB_URL,
		self::UUID
	];
}
