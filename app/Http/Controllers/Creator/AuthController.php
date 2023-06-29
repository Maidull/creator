<?php

namespace App\Http\Controllers\Creator;

use App\Helpers\AdminHelper;
use App\Helpers\CreatorHelper;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Models\Creator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmEmail;

class AuthController extends Controller
{
    public function showLogin(){
         if (auth()->guard('creator')->check()) {
            return redirect()->route('creator.dashboard');
        }
        $data['title'] = CreatorHelper::getPageTitle('ログイン');

        return view('creator.auth.login')->with(['data' => $data]);
    }
    /**
     * Login admin
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        // dd($credentials);
        if (!Auth()->guard('creator')->attempt($credentials)) {
            toastr(trans('auth.failed'), 'error');
            return redirect()->back()->withInput();
        }//end if

        if (Auth()->guard('creator')->user()->active === 0) {
            toastr('メールは検証されていない', 'error');
            Auth()->guard('creator')->logout();
            return redirect()->route('creator.login')->withInput();
        }

        return redirect()->route('creator.dashboard');
    }

    public function showRegister(){
         if (auth()->guard('creator')->check()) {
            return redirect()->route('creator.dashboard');
        }//end if

        $data['title'] = CreatorHelper::getPageTitle('Đăng ký tài khoản');

        return view('creator.auth.register')->with(['data' => $data]);
    }

    public function register(Request $request)
    {
        $messages = [
            'required' => '空白のままにすることはできません',
            'email' => 'メールアドレスの形式が正しくありません',
            'regex' => 'パスワードは半角英数字記号を含む6文字以上で入力してください',
            'min' => 'パスワードは半角英数字記号を含む6文字以上で入力してください',
            'unique' => 'メールは既に存在します'
            // 'required' => 'Trường :attribute không được để trống',
            // 'email' => 'Trường :attribute không hợp lệ',
            // 'unique' => 'Trường :attribute đã tồn tại',
            // 'min' => 'Trường :attribute phải có ít nhất 6 kí tự',
            // 'regex' => 'Trường :attribute phải có ít nhất 1 chữ thường, 1 chữ số và 1 ký tự đặc biệt',
            // 'same' => 'Trường :attribute và Mật khẩu nhập lại không trùng khớp'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc|unique:creators',
            'password' => 'required|min:6|regex:/[a-z]/|regex:/[0-9]/'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $creator = Creator::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'total_time' => 0,
            'numberof_projects' => 0
        ]);
        toastr('登録されたメールアドレス宛にメールが届くこと', 'success');
        mail::to($request->get('email'))->send(new ConfirmEmail($creator));
        return redirect()->back();
    }

    /**
     * Logout admin
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth()->guard('creator')->logout();

        return redirect()->route('creator.login');
    }

    /**
     * Get profile
     *
     * @return Application|Factory|View
     */
    public function profile()
    {
        $data['user'] = auth()->guard('creator')->user();
        $data['title'] = AdminHelper::getPageTitle(trans('admin.sidebar.profile'));

        $id = Auth::guard('creator')->user()->id;
        $creatorData = Creator::find($id);

        return view('creator.auth.profile',compact('creatorData'))->with(['data' => $data]);
    }

    public function EditProfile() {
        $data['user'] = auth()->guard('creator')->user();
        $data['title'] = AdminHelper::getPageTitle(trans('admin.sidebar.profile'));

        $id = Auth::guard('creator')->user()->id;
        $editData = Creator::find($id);

        return view('creator.auth.edit_profile',compact('editData'))->with(['data' => $data]);
    }

    public function verify($id) {
        Creator::find($id)->update(['active' => 1]);
        toastr('認証成功', 'success');
        return redirect()->route('creator.login');
    }
}
