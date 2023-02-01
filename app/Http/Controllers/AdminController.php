<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContentType;
use App\Models\Content;
use App\Models\Category;

class AdminController extends Controller {

	protected $navigation;

	public function __construct() {
		$this->navigation = Category::where('type', 'content-type')->orderBy('order', 'asc')->get();
	}

	public function dashboard() {
		return view('admin.home', [
			'navigation' => $this->navigation,
			'title' => 'Dashboard',
			'desc' => '',
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

	public function options() {
		$slug = 'options';
		$contentType = ContentType::where('slug', $slug)->first();
		$items = [];

		return view('admin.options', [
			'navigation' => $this->navigation,
			'contentType' => $contentType,
			'items' => $items,
		]);
	}

	public function list($slug) {
		$contentType = ContentType::where('slug', $slug)->first();

		switch ($slug) {
			case 'users':
				$items = User::orderBy('id', 'asc')->get();
				break;
			case 'content-types':
				$items = ContentType::where('protected', false)->orderBy('category_id', 'asc')->orderBy('order', 'asc')->get();
				break;
			default:
				$items = Content::where('content_type_id', $contentType->id)->orderBy('created_at', 'asc')->get();
		}

		return view('admin.list', [
			'navigation' => $this->navigation,
			'contentType' => $contentType,
			'items' => $items,
		]);
	}

	public function edit($slug, $id) {
		switch ($slug) {
			case 'users':
				$item = User::where('id', $id)->first();
				$item->contentType = ContentType::where('slug', 'users')->first();
				$item->fields = User::where('id', $id)->first();
				break;
			case 'content-types':
				$item = ContentType::where('id', $id)->first();
				$item->contentType = ContentType::where('slug', 'content-types')->first();
				$item->fields = ContentType::where('id', $id)->first();
				break;
			default:
				$item = Content::where('id', $id)->first();
		}

		return view('admin.edit', [
			'navigation' => $this->navigation,
			'item' => $item,
		]);
	}

	public function update(Request $request) {
	}

	public function add($slug) {
		$contentType = ContentType::where('slug', $slug)->first();

		return view('admin.add', [
			'navigation' => $this->navigation,
			'contentType' => $contentType,
		]);
	}

	public function create(Request $request) {
	}
}
