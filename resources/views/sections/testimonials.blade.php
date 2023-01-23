<x-sections::section class="!bg-haiti-lookout bg-center bg-cover bg-no-repeat">
	<row>
		<div class="col-span-full text-center">
			<x-components::heading tag="h2" style="h2" class="drop-shadow-md">
				What people are saying
			</x-components::heading>
		</div>

		@php
			$slides = [
				[
					'quote' => "James is one of the most inspiring people I have ever met. His testimony spoke to me so much and showed me what real grace is.",
					'author' => 'Dani',
					'trip' => 'Haiti 2017',
				],
				[
					'quote' => "I am so thankful God has put you in my life, and how He has used your story. You have inspired me to not be ashamed of my story because there is power in sharing it. You are a true story of who God is! Thank you!",
					'author' => 'Anissa',
					'trip' => 'Haiti 2017',
				],
				[
					'quote' => "You've helped me on my journey & taught me to keep fighting, keep pushing, and to go head first into the Lord's will. Thank you is an under-statement, but I am grateful for you and all your words of wisdom!",
					'author' => 'Haley',
					'trip' => 'NOLA 2017',
				],
				[
					'quote' => "You have changed my life in ways you can't imagine. Your wisdom, authenticity, leadership, and humor blows me away. I will never ever forget you!",
					'author' => 'Emily',
					'trip' => 'Haiti 2017',
				],
				[
					'quote' => "You lead with your whole heart and serve with your entire being. Thank you for being our guide and more importantly our friend.",
					'author' => 'Kristin',
					'trip' => 'Haiti 2017',
				],
				[
					'quote' => "Your words inspire everyone around you and your light shines so brightly. Thank you so much for baptizing me - I won't ever forget it!",
					'author' => 'Kayce',
					'trip' => 'Haiti 2014',
				],
				[
					'quote' => "This has been the hardest week ever, but I'm so thankful for the opportunity to come to Haiti. Thank you for following God's calling and allowing me to be involved in it!",
					'author' => 'Christine',
					'trip' => 'Haiti 2016',
				],
				[
					'quote' => "Words can't begin to describe how much you have taught me this week. God has used you to change so many lives. I will constantly pray for your mission.",
					'author' => 'Brooke',
					'trip' => 'NOLA 2017',
				],
				[
					'quote' => "It has been evident from day one that God has His hand on your life. I have been around pastors & missionaries for a very long time, but God has given you a unique power and love. Keep pouring it back out.",
					'author' => 'Isaac',
					'trip' => 'NOLA 2017',
				],
				[
					'quote' => "God had a great spiritual awakening for this team. Thanks for guiding me and encouraging me to get out of my comfort zone!",
					'author' => 'Madison',
					'trip' => 'NOLA 2017',
				],
				[
					'quote' => "You have touched all of our lives & I want to thank you for all you have done this week.",
					'author' => 'Charity',
					'trip' => 'Gainesville 2017',
				],
			];

			shuffle($slides);
		@endphp
		<x-components::carousel id="testimonials-carousel" label="Testimonials from trip participants" card="card-testimonial" :slides="$slides" />
	</row>
</x-sections::section>