<nav 
	class="
		relative
		w-full
		flex flex-wrap
		items-center
		justify-between
		py-4
		bg-gray-100
		text-gray-500
		hover:text-gray-700
		focus:text-gray-700
		shadow-lg
		navbar navbar-expand-lg navbar-light
	"
	>
	<div class="
		container-fluid w-full flex flex-wrap items-center justify-between px-6
	">
		<a 
			class="text-xl nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0" 
			href="{{ route('index') }}">
				Pro
		</a>
		<ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
			<li class="nav-item px-2">
				<a 
					class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0" 
					href="{{ route('index') }}"
				>Inicio</a>
			</li>
			<li class="nav-item pr-2">
				<a 
					class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0"
					href="{{ route('portfolio') }}"
				>
					Portfolio
				</a>
			</li>
			<li class="nav-item pr-2">
				<a 
					class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0"
					href="{{ route('cv') }}"
				>
					CV
				</a>
			</li>
			<li class="nav-item pr-2">
				<a 
					class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0"
					href="{{ route('sobre-mi') }}"
				>
					Sobre mí
				</a>
			</li>
		</ul>
	</div>
</nav>