<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display the user list with search and sorting
     * created : 08-06-2021
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search  = request('search_text');

        if ($search != NULL ) 
        {
            // check any search word match 
            $users = User::where('users.uuid', 'LIKE', '%' . $search . '%')
                        ->orWhere('users.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('users.description', 'LIKE', '%' . $search . '%')
                        ->orWhere('users.code', 'LIKE', '%' . $search . '%')
                        ->sortable('uuid')
                        ->paginate(15);
        } else {
            $users = User::sortable('uuid')->paginate(10);
        }

        return view('backend.user.index',compact('users', 'search'));

    }

    /**
     * Show the form for creating a new user.
     * created : 08-06-2021
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created user details in storage.
     * created : 08-06-2021
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'              => 'required|string',
            'description'       => 'required|string',
            'code'              => 'required|string',
            'status'            => 'required',
        ]);

         if($validator->fails()) {
            return redirect('backend/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user               = new User;
        $user->name         = $request->get('name');           
        $user->description  = $request->get('description');
        $user->code         = $request->get('code');
        $user->status       = $request->get('status'); 
        $user->save();

        return redirect('backend/'.$user->uuid.'/edit')->with('success', 'User Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the user details.
     * created : 08-06-2021
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('backend.user.edit',compact('user'));
    }

    /**
     * Update the specified user details in storage.
     * created : 08-06-2021
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'              => 'required|string',
            'description'       => 'required|string',
            'code'              => 'required|string',
            'status'            => 'required',
        ]);

         if($validator->fails()) {
            return redirect('backend/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user               = User::find($id);
        $user->name         = $request->get('name');           
        $user->description  = $request->get('description');
        $user->code         = $request->get('code');
        $user->status       = $request->get('status'); 
        $user->save();

        return redirect('backend/'.$id.'/edit')->with('success', 'User Details Successfully Updated.');
    }

    /**
     * Remove the specified user details from storage.
     * created : 08-06-2021
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::destroy($id);

        return redirect('backend')->with('success', 'User Details Successfully Deleted.');
    }
}
