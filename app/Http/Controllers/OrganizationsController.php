<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Organization;
use App\User;
use App\Role;

class OrganizationsController extends Controller
{
    public function users(Request $request, $id)
    {
        $organization = Organization::find($id);

        if ($organization) {
            return view('organizations.users', ['organization' => $organization]);
        } else {
            return (new Response('Organization not found', 404));
        }
    }

    public function sendInvite(Request $request, $id) {
        $organization = Organization::find($id);

        if ($organization) {
            $user = User::where('email', $request->input('email'))->first();

            if ($user) {
                Role::create(['user_id' => $user->id, 'organization_id' => $organization->id, 'role' => 'admin']);
                return redirect()->route('organizationUsers', $organization)
                    ->with('status', 'The user has been added to your organization.');
            } else {

            }
        } else {
            return (new Response('Organization not found', 404));
        }
    }
}
