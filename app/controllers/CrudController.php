<?php

class CrudController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the crud
		$crud = DB::table('cruds')->paginate(6);

		// load the view and pass the crud/index.blade.php
		return View::make('crud.index')
		->with('crud', $crud);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/crud/create.blade.php)
		return View::make('crud.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' 	     => 'required',
			'email'      => 'required|email',
			'nerd_level' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('crud/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
		      $nerd = new Crud;
		      $nerd->name 	= Input::get('name');
		      $nerd->email	= Input::get('email');
		      $nerd->nerd_level	= Input::get('nerd_level');
		      $nerd->save();

		Session::flash('message', 'Successfully created!');
		return Redirect::to('crud');
	    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$crud = Crud::find($id);

		return View::make('crud.show')
			->with('crud', $crud);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$crud = Crud::find($id);

		return View::make('crud.edit')
			->with('crud', $crud);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name' 	=> 'required',
			'email' => 'required|email',
			'nerd_level' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		//porsses the login
		if ($validator->fails()) {
			return Redirect::to('crud/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}
		else {
			//store
			$nerd = Crud::find($id);
			$nerd->name   	  = Input::get('name');
			$nerd->email 	  = Input::get('email');
			$nerd->nerd_level = Input::get('nerd_level');
			$nerd->save();

			// Redirect
			Session::flash('message', 'Successfully Updated!');
			return Redirect::to('crud');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//delete
		$nerd = Crud::find($id);
		$nerd->delete();

		// Redirect
		Session::flash('message', 'Successfully deleted');
		return Redirect::to('crud');
	}


}
