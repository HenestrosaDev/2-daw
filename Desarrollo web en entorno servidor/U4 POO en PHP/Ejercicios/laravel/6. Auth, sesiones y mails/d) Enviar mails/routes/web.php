Route::get('/', function() {
	$data = [
		'title' => 'Hola, soy el título',
		'content' => 'Hola, soy el contenido'
	];

	Mail::send('emails.test', $data, function($mail) {
		$mail->to('micheldemotril99@gmail.com')->subject('nose');
	});
	
	return view('welcome');
});