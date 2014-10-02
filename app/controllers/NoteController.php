<?php

use \Michelf\Markdown;

class NoteController extends \BaseController
{

	public $layout = 'layouts.base';
	
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->create();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('notes.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validate the input
		$validator = Validator::make(
			Input::all(),
			array(
				'title' => 'required|min:3',
				'note' => array('required', 'min:2'),
			)
		);
		
		if ($validator->fails()) {
			return Redirect::to('/')->with('error', 'Please input a note.');
		}
		
		$note = new Note;
		
		$note->title = Input::get('title');
		$note->note = Input::get('note');
		
		$note->hash = md5(Input::get('title'));
		
		$note->save();
		
		return Redirect::to('note/' . $note->hash);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  string  $hash
	 * @return Response
	 */
	public function show($hash)
	{
		$note = Note::where('hash', '=', $hash)->first();
		
		if (!$note) {
			return Redirect::to('/');
		}
		
		$note_display = array(
			'title' => $note->title,
			'note'  => Markdown::defaultTransform($note->note),
		);
		
		$this->layout->content = View::make('notes.show')->with('note', $note_display);
	}

}
