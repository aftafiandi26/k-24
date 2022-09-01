<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Members";
        return view('users.members.index', compact(['title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Register Member";

        return view('users.members.create', compact(['title']));
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
            'name'   => 'required|string',
            'email'  => 'required|email|unique:users,email',
            'hp'     => 'required|numeric|min:0|digits:12',
            'tanggal' => 'required|date',
            'ktp'    => 'required|numeric|min:0|digits:16',
            'jenis'  => 'required',
            'image'  => 'required|file|max:1024|mimes:jpeg,png',
            'access'    => 'required',
            'password'  => 'required|min:8|confirmed',
        ];

        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            toast('Sorry!, something wrong!!', 'error');
            return redirect()->route('members.create')
                ->withErrors($validator)
                ->withInput();
        }

        $path = null;

        if (!empty($request->image)) {
            $path = Storage::putFileAs('public/members', $request->image, $request->name . ".jpg");
        }

        $dataUser = [
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'status'        => 1,
            'access'        => $request->access
        ];

        User::create($dataUser);
        $user = User::latest()->first();

        $dataMember = [
            'users_id'       => $user->id,
            'hp'             => $request->hp,
            'lahir'          => $request->tanggal,
            'ktp'            => $request->ktp,
            'kelamin'        => $request->jenis,
            'photo'          => $path,
        ];

        Member::create($dataMember);

        toast('Data successfully update', 'success');
        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $member = Member::with('users')->find($member->id);

        if ($member->users->status === 1) {
            $status = "Active";
        } else {
            $status = "Deactive";
        }

        $return = '<div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">' . $member->users->name . '</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>' . $member->users->email . '</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>' . $status . '</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>:</td>
                                    <td>' . $member->users->access . '</td>
                                </tr>
                                <tr>
                                    <th>Date Birthday</th>
                                    <td>:</td>
                                    <td>' . $member->lahir . '</td>
                                </tr>
                                <tr>
                                    <th>HP</th>
                                    <td>:</td>
                                    <td>' . $member->hp . '</td>
                                </tr>
                                <tr>
                                    <th>KTP</th>
                                    <td>:</td>
                                    <td>' . $member->ktp . '</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>:</td>
                                    <td>' . $member->kelamin . '</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                        <img class="img-preview img-fluid mr-3" width="100px" height="100px" alt="unknow" src="' . asset(Storage::url($member->photo)) . '">
                        </div>
                    </div>    
    ';
        return $return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $title = "Edit - Member";
        $member = Member::with('users')->find($member->id);

        return view('users.members.update', compact(['title', 'member']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $rule = [
            'name'   => 'required|string',
            'email'  => 'required|email',
            'hp'     => 'required|numeric|min:0|digits:12',
            'tanggal' => 'required|date',
            'ktp'    => 'required|numeric|min:0|digits:16',
            'jenis'  => 'required',
            'image'  => 'file|max:1024|mimes:jpeg,png',
            'access'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            toast('Sorry!, something wrong!!', 'error');
            return redirect()->route('members.edit', $member->id)
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($member->users_id);
        $email = $request->email;
        if ($user->email !== $request->email) {
            $findEmail = User::where('email', 'like', '%' . $request->email . '%')->first();
            if (!empty($findEmail)) {
                toast('Sorry, email already', 'error');
                return redirect()->route('members.edit', $member->id);
            }
        }

        if (!empty($request->image)) {
            Storage::delete($member->photo);

            $path = Storage::putFileAs('public/members', $request->image, $request->name . ".jpg");
        }

        if (empty($request->image)) {
            $path = $member->photo;
        }

        $dataUser = [
            'name'          => $request->name,
            'email'         => $email,
            'status'        => 1,
            'access'        => $request->access
        ];

        User::where('id', $member->user_id)->update($dataUser);

        $dataMember = [
            'hp'             => $request->hp,
            'lahir'          => $request->tanggal,
            'ktp'            => $request->ktp,
            'kelamin'        => $request->jenis,
            'photo'          => $path,
        ];

        Member::where('id', $member->id)->update($dataMember);

        toast('Data successfully update', 'success');
        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $user = User::find($member->users_id);

        Storage::delete($member->photo);
        $member->delete();
        $user->delete();

        toast("Deleted Successfully", 'info');
        return redirect()->route('members.index');
    }
}
