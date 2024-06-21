<div class="mini-container mx-auto">
	<header class="p-3 pb-md-4 text-center">
		<h1 class="display-4 fw-normal">{{ $title }}</h1>
	</header>

	<main class="card bg-primary rounded-2">
		<article 
			class="card-body mx-auto w-100" 
			style="max-width: 350px;"
		>
			{{ $slot }}
		</article>
	</main>
</div>