<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = UserHelper::getPageTitle('クライアント');
        $data['users'] = UserService::getInstance()->getListUsers();

        return view('admin.users.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = UserHelper::getPageTitle('クライアント');

        return view('admin.users.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => '空白のままにすることはできません',
            'email' => 'メールアドレスの形式が正しくありません',
            'regex' => 'パスワードは半角英数字記号を含む6文字以上で入力してください',
            'min' => 'パスワードは半角英数字記号を含む6文字以上で入力してください',
            'unique' => 'メールは既に存在します'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc|unique:users',
            'password' => 'required|min:6|regex:/[a-z]/|regex:/[0-9]/'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $arr = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
        UserService::getInstance()->create($arr);
        $data['title'] = UserHelper::getPageTitle('クライアント');
        toastr(trans('admin.response.create', ['name' => 'クライアント']));

        return redirect(route('admin.users.index'))->with(['data', $data]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $data['title'] = UserHelper::getPageTitle('クライアント');
        $data['user'] = UserService::getInstance()->edit($user);

        return view('admin.users.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $messages = [
            'required' => 'Trường :attribute không được để trống',
            'email' => 'Trường :attribute không hợp lệ',
            'unique' => 'Trường :attribute đã tồn tại',
            'min' => 'Trường :attribute phải có ít nhất 6 kí tự',
            'regex' => 'Trường :attribute phải có ít nhất 1 chữ hoa, 1 chữ thường, 1 chữ số và 1 ký tự đặc biệt',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc|unique:users,email,' . $user->id,
            'password' => 'required|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $arr = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $user->password == $request->password ? $request->password : bcrypt($request->password)
        ];
        UserService::getInstance()->update($user, $arr);
        toastr(trans('admin.response.update', ['name' => 'クライアント']));

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        toastr(trans('admin.response.delete', ['name' => 'クライアント']));

        return redirect(route('admin.users.index'));
    }
}
