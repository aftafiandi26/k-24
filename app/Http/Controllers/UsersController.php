<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Home - Users";
        return view('users.users.index', compact(['title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create - User";
        return view('users.users.create', compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'name'      => 'required|min:3',
            'email'     => 'required|email|unique:users,email',
            'access'    => 'required',
            'password'  => 'required|min:8|confirmed',
        ];

        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return redirect()->route('users.create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'status'    => 1,
            'access'    => $request->access,
        ];

        User::create($data);
        toast('Data create successfully', 'success');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if ($user->status === 1) {
            $status = "Active";
        } else {
            $status = "Deactive";
        }

        $return = '<div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">' . $user->name . '</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>' . $user->email . '</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>' . $status . '</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>:</td>
                                    <td>' . $user->access . '</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>    
    ';
        return $return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $title = "Edit - user";
        return view('users.users.update', compact(['title', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'access'    => 'required',
            'status'    => 'required',
        ];

        $user = User::find($id);
        $email = $request->email;

        if ($user->email !== $request->email) {
            $findEmail = User::where('email', 'like', '%' . $request->email . "%")->first();
            if (!empty($findEmail)) {
                toast('Sorry, email already', 'error');
                return redirect()->route('users.edit', $id);
            }
        }

        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name'      => $request->name,
            'email'     => $email,
            'status'    => $request->status,
            'access'    => $request->access,
        ];

        User::where('id', $id)->update($data);
        toast('Data updated successfully', 'success');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        toast('Delete successfully', 'info');
        return redirect()->route('users.index');
    }
}
