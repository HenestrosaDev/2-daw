<div class="mini-container mx-auto">
	<header class="pb-md-4 p-3 text-center">
		<h1 class="display-4 fw-normal">{{ $title }}</h1>
	</header>

	<main class="card bg-primary rounded-2">
		<article
			class="card-body w-100 mx-auto"
			style="max-width: 350px;"
		>
			{{ $slot }}
		</article>
	</main>
</div>
