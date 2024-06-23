<nav class="relative w-full flex flex-wrap items-center justify-between py-4 bg-gray-100 shadow-lg navbar navbar-expand-lg navbar-light">
	<div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
		<a 
			class="text-xl nav-link text-gray-500 p-0" 
			href="{{ route("index") }}"
		>
			Ejercicio 1b
		</a>
		<ul class="navbar-nav flex pl-0 list-style-none mr-auto">
			<li class="nav-item px-2">
				<a 
					class="{{ (request()->route()->getName() == "index" ? "text-red-500 font-bold" : "") }} nav-link text-gray-500 hover:text-red-500 focus:text-red-500 p-0"
					href="{{ route("index") }}"
				>
					Inicio
				</a>
			</li>
			<li class="nav-item pr-2">
				<a 
					class="{{ (request()->route()->getName() == "portfolio" ? "text-red-500 font-bold" : "") }} nav-link text-gray-500 hover:text-red-500 focus:text-red-500 p-0" 
					href="{{ route("portfolio") }}"
				>
					Portfolio
				</a>
			</li>
			<li class="nav-item pr-2">
				<a 
					class="{{ (request()->route()->getName() == "cv" ? "text-red-500 font-bold" : "") }} nav-link text-gray-500 hover:text-red-500 focus:text-red-500 p-0" 
					href="{{ route("cv") }}"
				>
					CV
				</a>
			</li>
			<li class="nav-item pr-2">
				<a 
					class="{{ (request()->route()->getName() == "sobre-mi" ? "text-red-500 font-bold" : "") }} nav-link text-gray-500 hover:text-red-500 focus:text-red-500 p-0" 
					href="{{ route("sobre-mi") }}"
				>
					Sobre mí
				</a>
			</li>
		</ul>
	</div>
</nav>