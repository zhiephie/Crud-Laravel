<?php

class UsersController extends \BaseController {

	public function getDatatable()
    {
   //      return View::make('datatable', array (
   //      	'table' => Datatable::table()
   //      	->addColumn('Name')
   //      	->setUrl(URL::to('auth/users/table'))
			// ->render(),
   //      	));
        // return View::make('datatable', array(
        // Datatable::collection(User::all(array('id','name')))
        // ->showColumns('id', 'name')
        // ->searchColumns('name')
        // ->orderColumns('id','name')
        // ->make(),
        //  ));

        $datatable = DB::table('users')->paginate(6);
        
        return View::make('datatable')
        ->with('users', $datatable);

        //  return Datatable::collection(User::all(array('id','name')))
        // ->showColumns('id', 'name')
        // ->searchColumns('name')
        // ->orderColumns('id','name')
        // ->make();
    }

    public function getTable()
	{
	return Datatable::query(DB::table('users'))
               ->showColumns('username')
               ->searchColumns("firstname", "lastname")
               ->make();	
	}


    // public function getDatatable()
    // {
    // 	$this->needed('manage_users');
    //     return Datatable::collection(User::all(array('id','name')))
    //     ->showColumns('id', 'name')
    //     ->searchColumns('name')
    //     ->orderColumns('id','name')
    //     ->make();
    // }
}