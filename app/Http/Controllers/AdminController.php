<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentType;

class AdminController extends Controller {

	protected $contentTypes;

	public function __construct() {
		$this->contentTypes = ContentType::orderBy('order', 'asc')->get()->toArray();
	}

	public function dashboard() {
		return view('admin.home', [
			'contentTypes' => $this->contentTypes,
			'title' => 'Dashboard',
			'desc' => '',
		]);
	}

	public function payments() {
		$columns = [];

		return view('admin.list', [
			'contentTypes' => $this->contentTypes,
			'title' => 'Payments',
			'desc' => '',
			'items' => [],
			'columns' => $columns,
		]);
	}

	public function donations() {
		$columns = [];

		return view('admin.list', [
			'contentTypes' => $this->contentTypes,
			'title' => 'Donations',
			'desc' => '',
			'items' => [],
			'columns' => $columns,
		]);
	}

	public function subscribers() {
		$columns = [];

		return view('admin.list', [
			'contentTypes' => $this->contentTypes,
			'title' => 'Subscribers',
			'desc' => '',
			'items' => [],
			'columns' => $columns,
		]);
	}

	public function trips() {
		$columns = [];

		return view('admin.list', [
			'contentTypes' => $this->contentTypes,
			'title' => 'Trips',
			'desc' => '',
			'items' => [],
			'columns' => $columns,
		]);
	}

	public function groups() {
		$columns = [];

		return view('admin.list', [
			'contentTypes' => $this->contentTypes,
			'title' => 'Groups',
			'desc' => '',
			'items' => [],
			'columns' => $columns,
		]);
	}

	public function participants() {
		$columns = [];

		return view('admin.list', [
			'contentTypes' => $this->contentTypes,
			'title' => 'Participants',
			'desc' => '',
			'items' => [],
			'columns' => $columns,
		]);
	}

	public function users() {
		$columns = [];

		return view('admin.list', [
			'contentTypes' => $this->contentTypes,
			'title' => 'Users',
			'desc' => '',
			'items' => [],
			'columns' => $columns,
		]);
	}

	public function contentTypes() {
		$columns = [
			[
				'text' => 'ID',
				'key' => 'id',
				'class' => 'text-center uppercase',
			],
			[
				'icon' => 'fa-icons',
				'key' => 'icon',
				'class' => 'text-center',
			],
			[
				'text' => 'Label',
				'key' => 'plural',
				'class' => '',
			],
			[
				'text' => 'Slug',
				'key' => 'slug',
				'class' => 'text-center',
			],
			[
				'text' => 'Updated',
				'key' => 'updated_at',
				'class' => 'text-center',
			],
			[
				'text' => 'Created',
				'key' => 'created_at',
				'class' => 'text-center',
			],
		];

		return view('admin.list', [
			'contentTypes' => $this->contentTypes,
			'title' => 'Content Types',
			'desc' => '',
			'items' => $this->contentTypes,
			'columns' => $columns,
		]);
	}

	public function options() {
		return view('admin.options', [
			'contentTypes' => $this->contentTypes,
			'title' => 'Options',
			'desc' => '',
		]);
	}

	public function contentType(Request $request) {
		$slug = $request->segment(2);
		$type = ContentType::where('slug', $slug)->first();
		$columns = [];

		return view('admin.list', [
			'contentTypes' => $this->contentTypes,
			'title' => $type->plural,
			'desc' => $type->desc,
			'items' => [],
			'columns' => $columns,
		]);
	}
}
