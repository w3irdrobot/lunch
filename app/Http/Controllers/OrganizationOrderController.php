<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OrganizationOrder;

class OrganizationOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function show(Request $request, $orgId, $id)
    {
        $lineItems = LineItem::where('organization_order_id', $id)->get();
        return view('organization_orders.show', ['lineItems' => $lineItems]);
    }
}
