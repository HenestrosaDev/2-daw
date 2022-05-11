<div {{ $attributes->merge(['class' => 'alert alert-dismissible']) }}>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	{{ $slot }}
</div>
