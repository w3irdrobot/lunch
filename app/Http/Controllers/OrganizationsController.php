<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Organization;
use App\Restaurant;
use App\User;
use App\Role;
use App\Invitation;
use Mail;

class OrganizationsController extends Controller
{
    public function users(Request $request, $id)
    {
        $organization = Organization::findOrFail($id);

        return view('organizations.users', ['organization' => $organization]);
    }

    public function sendInvite(Request $request, $id) {
        $organization = Organization::findOrFail($id);

        $email = $request->input('email');
        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            Role::create(['user_id' => $user->id, 'organization_id' => $organization->id, 'role' => 'admin']);

            $link = url('/') . '/dashboard';
            Mail::send('emails.new_invitation', ['link' => $link], function($message) use ($email) {
                $message->to($email)->subject('You have been invited to Lunch.run!');
            });

            return redirect()->route('organizationUsers', $organization)
                ->with('status', 'The user has been added to your organization.');
        } else {
            $token = substr(md5(rand()), 0, 20);
            Invitation::create([
                'email' => $email,
                'token' => $token,
                'organization_id' => $id
            ]);

            $link = url('/') . '/auth/register?t=' . $token;
            Mail::send('emails.new_invitation', ['link' => $link], function($message) use ($email) {
                $message->to($email)->subject('You have been invited to Lunch.run!');
            });

            return redirect()->route('organizationUsers', $organization)
                ->with('status', 'The user has been invited to your organization.');
        }
    }

    public function addRestaurant(Request $request, $orgId, $id) {
        $organization = Organization::find($orgId);
        $restaurant = Restaurant::find($id);
        $organization->restaurants()->save($restaurant);

        return redirect()->route('restaurant.index',['orgId'=>$orgId]);
    }

    public function removeRestaurant(Request $request, $orgId, $id) {
        $organization = Organization::find($orgId);
        /* @var $organization Organization */
        $organization->restaurants()->detach($id);

        return redirect()->route('restaurant.index',['orgId'=>$orgId]);
    }

    public function add() {
        return view('organizations.add');
    }

    public function create(Request $request) {
        $organization = Organization::create(['name' => $request->input('name')]);

        if ($organization->isValid()) {

            //create a role for current user
            $role = new Role();
            $role->user_id = $request->user()->id;
            $role->organization_id = $organization->id;
            $role->role = 'admin';
            $role->save();

            return redirect()->route('organizationUsers', [$organization->id]);
        }

        return redirect()
            ->route('newOrganizationForm')
            ->withInput()
            ->withErrors($organization->getErrors());
    }

    public function show(Request $request, $id = 0) {
        $roles = $request->user()->roles;

        if ($id == 0 && !$roles->isEmpty()) {
            $id = $roles[0]->organization_id;
        }
        if($roles->isEmpty()) {
            return redirect()->route('newOrganizationForm');
        }

        $organization = Organization::find($id);

        return view('organizations.view',[
            'organization' => $organization,
            'roles' => $roles
        ]);
    }
}
