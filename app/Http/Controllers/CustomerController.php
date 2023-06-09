<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(Request $request): View
    {
        $query = Customer::query();

        if ($request->filled('blocked')) {
            $query->where('blocked', $request->input('blocked'));
        }
        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->input('email') . '%');
        }
        if ($request->filled('phone')) {
            $query->where('phone', 'LIKE', '%' . $request->input('phone') . '%');
        }
        if ($request->filled('name')) {
            $name = $request->input('name');
            $query->where(function ($query) use ($name) {
                $query->where('first_name', 'LIKE', '%' . $name . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $name . '%');
            });
        }

        $customers = $query->paginate(10);

        return view('customers.index', compact('customers'));
    }

    public function show($id): View
    {
        $customer = Customer::find($id);

        if (!$customer) {
            abort(404);
        }

        $addresses = $customer->addresses()
            ->orderBy('added_date', 'desc')
            ->get();

        return view('customers.show', compact('customer', 'addresses'));
    }
}
