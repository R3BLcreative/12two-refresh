<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Option extends Model {
	use HasFactory;

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * Add an option value
	 *
	 * @param $key
	 * @param $value
	 * @param string $type
	 * @return bool
	 */
	public static function add($key, $value, $type = 'string') {
		if (self::has($key)) {
			return self::set($key, $value, $type);
		}

		return self::create(['name' => $key, 'value' => $value, 'type' => $type]) ? $value : false;
	}

	/**
	 * Get an option value
	 *
	 * @param $key
	 * @param null $default
	 * @return bool|int|mixed
	 */
	public static function get($key, $default = null) {
		if (self::has($key)) {
			$setting = self::getAllOptions()->where('name', $key)->first();
			return self::castValue($setting->value, $setting->type);
		}

		return self::getDefaultValue($key, $default);
	}

	/**
	 * Set an option value
	 *
	 * @param $key
	 * @param $value
	 * @param string $type
	 * @return bool
	 */
	public static function set($key, $value, $type = 'string') {
		if ($setting = self::getAllOptions()->where('name', $key)->first()) {
			return $setting->update([
				'name' => $key,
				'value' => $value,
				'type' => $type
			]) ? $value : false;
		}

		return self::add($key, $value, $type);
	}

	/**
	 * Remove an option
	 *
	 * @param $key
	 * @return bool
	 */
	public static function remove($key) {
		if (self::has($key)) {
			return self::whereName($key)->delete();
		}

		return false;
	}

	/**
	 * Check if an option exists
	 *
	 * @param $key
	 * @return bool
	 */
	public static function has($key) {
		return (bool) self::getAllOptions()->whereStrict('name', $key)->count();
	}

	/**
	 * Get the validation rules for option fields
	 *
	 * @return array
	 */
	public static function getValidationRules() {
		return self::getDefinedOptionFields()->pluck('rules', 'name')
			->reject(function ($value) {
				return is_null($value);
			})->toArray();
	}

	/**
	 * Get the data type of an option
	 *
	 * @param $field
	 * @return mixed
	 */
	public static function getDataType($field) {
		$type  = self::getDefinedOptionFields()
			->pluck('data', 'name')
			->get($field);

		return is_null($type) ? 'string' : $type;
	}

	/**
	 * Get default value for an option
	 *
	 * @param $field
	 * @return mixed
	 */
	public static function getDefaultValueForField($field) {
		return self::getDefinedOptionFields()
			->pluck('value', 'name')
			->get($field);
	}

	/**
	 * Get default value from config if no value passed
	 *
	 * @param $key
	 * @param $default
	 * @return mixed
	 */
	private static function getDefaultValue($key, $default) {
		return is_null($default) ? self::getDefaultValueForField($key) : $default;
	}

	/**
	 * Get all the option fields from config
	 *
	 * @return Collection
	 */
	private static function getDefinedOptionFields() {
		return collect(config('options'))->pluck('fields')->flatten(1);
	}

	/**
	 * Get all the option fields from config
	 *
	 * @return Collection
	 */
	public static function getDefinedOptions() {
		return collect(config('options'));
	}

	/**
	 * caste value into respective type
	 *
	 * @param $value
	 * @param $castTo
	 * @return bool|int
	 */
	private static function castValue($value, $castTo) {
		switch ($castTo) {
			case 'int':
			case 'integer':
				return intval($value);
				break;

			case 'bool':
			case 'boolean':
				return boolval($value);
				break;

			default:
				return $value;
		}
	}

	/**
	 * Get all the options
	 *
	 * @return mixed
	 */
	public static function getAllOptions() {
		return Cache::rememberForever('options.all', function () {
			return self::all();
		});
	}

	/**
	 * Flush the cache
	 */
	public static function flushCache() {
		Cache::forget('options.all');
	}

	/**
	 * The "booting" method of the model.
	 *
	 * @return void
	 */
	protected static function boot() {
		parent::boot();

		static::updated(function () {
			self::flushCache();
		});

		static::created(function () {
			self::flushCache();
		});
	}
}
