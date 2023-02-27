@extends('layouts.admin')

@section('head.title', $head['title'])

@section('titlebar')
	<x-acomponents::titlebar
		icon="fa-circle-user"
		:title="$page['title']"
		:subtext="$page['subtext'] ?? ''"
	></x-acomponents::titlebar>
@endsection

@section('main')
@endsection