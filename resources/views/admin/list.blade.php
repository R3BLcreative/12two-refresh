<x-layouts::admin
	:contentTypes="$contentTypes"
	:seo="[
		'title' => '12Two Missions | Admin - ' . $title,
	]">

	<x-slot:main>
		<div class="flex items-center gap-4 px-8 py-9">
			<i class="fa-duotone fa-table-list text-7xl"></i>
			<x-components::admin-heading tag="h1" style="h2" :subtext="$desc">
				{!! $title !!}
			</x-components::admin-heading>
		</div>

		<div class="w-full relative overflow-auto">

			{{-- HEADER --}}
			<div class="sticky top-0 z-10 grid gap-4 bg-surface-light-500 px-8 py-3 shadow-sm font-black border-t border-b border-gray-300 text-body-light-600 grid-cols-content-types w-full">
				@foreach ($columns as $column)
					@isset($column['icon'])
						<div class="{{ $column['class'] }}"><i class="fa-duotone {{ $column['icon'] }} text-2xl"></i></div>
					@else
						<div class="{{ $column['class'] }}">{{ $column['text'] }}</div>
					@endisset
				@endforeach
			</div>

			{{-- ITEMS --}}
			@foreach ($items as $item)
				<div class="grid grid-cols-content-types items-center w-full px-8 py-4 gap-4 border-b border-gray-200 odd:bg-gray-50 tranistion-all ease-in-out hover:bg-surface-light-500 hover:cursor-pointer">
					@foreach ($columns as $column)
						@switch($column['key'])
							@case('id')
								<div class="text-center font-semibold text-gray-500">{{ $item['id'] }}</div>
								@break

							@case('icon')
								<div class="text-center text-3xl text-body-light-600"><i class="fa-duotone {{ $item['icon'] }}"></i></div>
								@break

							@case('plural')
								<div class="font-semibold text-md">{{ $item['plural'] }}</div>
								@break

							@case('slug')
								<div class="text-center text-sm font-semibold">{{ $item['slug'] }}</div>
								@break

							@case('updated_at')
							@case('created_at')
								<div class="text-center text-sm flex flex-col items-center justify-center text-gray-500">
									<span class="font-semibold">{{ date('m/d/Y', strtotime($item[$column['key']])) }}</span>
									<span class="italic">{{ date('h:i a', strtotime($item[$column['key']])) }}</span>
								</div>
								@break

							@default
								<div class="{{ $column['class'] }}">{{ $item[$column['key']] }}</div>
						@endswitch
					@endforeach
				</div>
			@endforeach
		</div>
	</x-slot:main>

</x-layouts::admin>