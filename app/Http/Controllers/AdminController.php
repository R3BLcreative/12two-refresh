<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContentTypeCat;
use App\Models\ContentType;
use App\Models\Content;

class AdminController extends Controller {

	protected $navigation;

	public function __construct() {
		$this->navigation = ContentTypeCat::orderBy('order', 'asc')->get();
	}

	public function dashboard() {
		return view('admin.home', [
			'navigation' => $this->navigation,
			'title' => 'Dashboard',
			'desc' => '',
		]);
	}

	public function list($slug) {
		$contentType = ContentType::where('slug', $slug)->first();
		$items = Content::where('content_type_id', $contentType->id)->orderBy('created_at', 'asc')->get();

		return view('admin.list', [
			'navigation' => $this->navigation,
			'contentType' => $contentType,
			'items' => $items,
			'columns' => json_decode($contentType->columns),
		]);
	}

	public function edit($slug, $id) {
		$item = Content::where('id', $id)->first();

		return view('admin.edit', [
			'navigation' => $this->navigation,
			'item' => $item,
		]);
	}

	public function users() {
		$slug = 'users';
		$contentType = ContentType::where('slug', $slug)->first();
		$items = User::orderBy('id', 'asc')->get();

		return view('admin.users', [
			'navigation' => $this->navigation,
			'contentType' => $contentType,
			'items' => $items,
			'columns' => json_decode($contentType->columns),
		]);
	}

	public function menus() {
		$slug = 'menus';
		$contentType = ContentType::where('slug', $slug)->first();
		$items = [];

		return view('admin.menus', [
			'navigation' => $this->navigation,
			'contentType' => $contentType,
			'items' => $items,
			'columns' => [],
		]);
	}

	public function contentTypes() {
		$slug = 'content-types';
		$contentType = ContentType::where('slug', $slug)->first();
		$items = ContentType::where('protected', false)->orderBy('cat_id', 'asc')->orderBy('order', 'asc')->get();

		return view('admin.content-types', [
			'navigation' => $this->navigation,
			'contentType' => $contentType,
			'items' => $items,
			'columns' => json_decode($contentType->columns),
		]);
	}

	public function options() {
		$slug = 'options';
		$contentType = ContentType::where('slug', $slug)->first();
		$items = [];

		return view('admin.options', [
			'navigation' => $this->navigation,
			'contentType' => $contentType,
			'items' => $items,
			'columns' => [],
		]);
	}
}
