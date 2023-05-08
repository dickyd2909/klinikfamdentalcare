<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{
    public function account_submit(Request $request) {
        $img = $request->foto;
        $imgext = $request->foto->extension();
        $imgname = time().'-'.User::generateID().'.'.$imgext;

        $request->merge([
            'id' => User::generateID(),
            'profile_pict' => $imgname,
        ]);

        $validated = $request->validate([
            'id' => 'required|unique:users',
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required_with:retype_password|same:retype_password|min:8|max:255',
            'profile_pict' => 'required'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $query = User::create($validated);

        $img->move(public_path('/img/account'), $imgname);

        if ($query == true) {
            return redirect('/admin-area/akun')->with('success', 'Berhasil menambahkan data akun.');
        } else {
            return redirect('/admin-area/akun')->with('error', 'Terjadi kesalahan dalam menambahkan data akun.');
        }
    }

    public function account_edit($id, $from) {
        $account = User::where('id', decrypt($id))->get();

        //true = delete from profile details
        //false = delete from acc forms
        if ($from == true) {
            return view('admin.account_edit', [
                'title' => 'Edit Data Pengguna',
                'menu' => 'pengguna',
                'account' => $account,
                'admin' => true
            ]);
        } else {
            return view('admin.account_edit', [
                'title' => 'Edit Data Pengguna',
                'menu' => 'pengguna',
                'account' => $account,
                'admin' => false
            ]);
        }
    }

    public function account_update(Request $request) {
        $img = $request->foto;
        $pass_check = $request->password;
        $query_check = User::where('id', $request->id)->get();

        if ($pass_check != null) {
            if (Hash::check($request->old_password, $query_check[0]->password)) {
                $validated = $request->validate([
                    'password' => 'required_with:retype_password|same:retype_password|min:8|max:255'
                ]);
    
                $validated['password'] = Hash::make($validated['password']);
            } else {
                return redirect()->back()->with('error_pass', 'Sandi tidak sama dengan database');
            }
        } else if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request -> id.'.'.$imgext;
            $request->merge([
                'profile_pict' => $imgname,
            ]);

            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => ['required', 'email:dns', Rule::unique('users')->ignore($request->id)],
                'profile_pict' => 'required'
            ]);

            User::deleteImage($request->id);
            $img->move(public_path('/img/account'), $imgname);
        } else {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => ['required', 'email:dns', Rule::unique('users')->ignore($request->id)],
            ]);
        }
        
        $query = User::where('id', $request->id)->update($validated);

        if ($query == true) {
            return redirect('/admin-area/akun')->with('success', 'Berhasil mengedit data akun.');
        } else {
            return redirect('/admin-area/akun')->with('error', 'Terjadi kesalahan dalam mengedit data akun.');
        }
    }

    public function account_delete($id, $from) {
        User::deleteImage(decrypt($id));

        $query = User::destroy(decrypt($id));

        if ($query == true) {
            //true = delete from profile details
            //false = delete from acc forms
            if ($from == false) {
                return redirect('/admin-area/akun')->with('success', 'Berhasil menghapus data akun.');
            } else {
                return redirect('/logout')->with('msg', 'deleted');
            }
        } else {
            return redirect('/admin-area/akun')->with('error', 'Terjadi kesalahan dalam menghapus data akun.');
        }
    }

    public function account_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = User::where('name', 'like',$validated)->orWhere('email', 'like',$validated)->orWhere('id', 'like',$validated)->paginate(8);

        //dd($query);

        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Akun tidak ditemukan.');
            } else {
                return view('admin.account', [
                    'title' => 'Hasil Pencarian Akun : '.$request->cari,
                    'menu' => 'pengguna',
                    'account' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian akun.');
        }
    }
    
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin-area');
        }

        return back()->with('message', 'E-Mail / Sandi yang anda masukkan salah.');
    }

    public function logout() {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        if (session()->has('msg')) {
            return redirect('/login')->with('message', 'Penghapusan akun berhasil.');
        } else {
            return redirect('/login');
        }
    }
}
