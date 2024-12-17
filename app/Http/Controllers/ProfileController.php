<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AdminProfilePasswordUpdateRequest;
use App\Http\Requests\Admin\AdminProfilePersonalUpdateRequest;

class ProfileController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::user();
        return view('admin.profile.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminProfilePersonalUpdateRequest $request, string $id)
    {
        $imagePath = $this->handleImageUpload($request, 'image', $request->old_image, 'profile');

        $admin = User::findOrFail($id);

        $admin->name = $request->name;
        $admin->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $admin->updated_at = saveDateTimeNow();
        $admin->updated_by = auth()->user()->name;

        $admin->save();

        return redirect()->back()->with('success', __('Data profil berhasil diperbarui'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updatePassword(AdminProfilePasswordUpdateRequest $request, string $id)
    {
        $admin = User::findOrFail($id);
        $admin->password = bcrypt($request->password);
        $admin->save();

        return redirect()->back()->with('success', __('Data password berhasil diperbarui'));
    }
}
