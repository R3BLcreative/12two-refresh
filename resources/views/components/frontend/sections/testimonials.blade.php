@props(['slides' => []])

<x-sections::section class="!bg-haiti-lookout bg-center bg-cover bg-no-repeat">
	<row>
		<div class="col-span-full text-center">
			<x-components::heading tag="h2" style="h2" class="drop-shadow-md">
				What people are saying
			</x-components::heading>
		</div>

		<x-components::carousel id="testimonials-carousel" label="Testimonials from trip participants" card="card-testimonial" :slides="$slides" />
	</row>
</x-sections::section>