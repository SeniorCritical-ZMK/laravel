<?php
/**
 * Created by PhpStorm.
 * User: pyaesoneaung
 * Date: 3/30/18
 * Time: 18:48
 */

namespace App\Modules\Internal\app\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Modules\Internal\app\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('internal::backend.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());
        return redirect()->route('internal::profile.index')->with('message', 'Successfully updated user information');
    }

    public function showPasswordForm(Request $request)
    {
        $user = auth()->user();
        return view('internal::backend.profile.password-form', compact('user'));
    }

    public function showAvatarForm(Request $request)
    {
        $user = auth()->user();
        return view('internal::backend.profile.avatar-form', compact('user'));
    }

    public function showAvatar(Request $request)
    {
        $user = auth()->user();
        return view('internal::backend.profile.avatar-form', compact('user'));
    }

    public function updateAvatar(Request $request)
    {
        $this->validate($request,
            [
                'avatar' => 'required'
            ]);

        $user = auth()->user();
        $path = $request->avatar->store('avatar/' . $user->id, 'public');
        $this->deleteExistingImage($user->image_path);
        $user->image_path = $path;
        $user->save();

        return redirect()->back()->with('message', 'Successfully updated avatar');
    }

    public function updatePassword(PasswordRequest $request)
    {
        $user = auth()->user();

        if (Hash::check($request->password, $user->password)) {
            $user->update(['password' => bcrypt($request->new_password)]);
        } else {
            return redirect()->back()->withErrors(['password' => ['Wrong password']]);
        }

        return redirect()->back()->with('message', 'Successfully updated password');
    }

    protected function deleteExistingImage($path)
    {
        if ($path) {
            Storage::delete($path);
        }
    }
}