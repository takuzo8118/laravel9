<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());
        // こちらはメールアドレスに関しての処理
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        // どのユーザーが投稿しているのかを判断する
        $userId = $request->user()->id;

        // プロフィール画像の変更がある場合
        $updateUser = $request->all();
        if ($request->file != null) {
            $fileName = $request->file('file')->getClientOriginalName();
            // storeメソッドでファイル名を自動生成しつつstorage配下のディレクトリに保存
            $imagePath = $request->file->storeAs('public/image/' . $userId, $fileName);
            // $updateUserのimageカラムに$imagePathを保存
            $updateUser['image'] = $imagePath;
        }

        // ここで保存先を含んだupdateUserを渡す
        $request->user()->fill($updateUser)->save();

        // リダイレクト時に更新メッセージと一緒に送信
        return Redirect::route('profile.edit')->with('status', 'プロフィールを更新しました');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();
        // こちらで物理削除→ソフトデリートに変更
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
