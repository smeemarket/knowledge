<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        if (Session::has('ALL_SEARCH')) {
            $sessionData = Session::get('ALL_SEARCH');
        } else {
            $sessionData = null;
        }
        Session::forget('ALL_SEARCH'); // delete
        $customerData = Customer::get();
        // dd($customerData->toArray());
        return view('list')->with(['data' => $customerData, 'sessionData' => $sessionData]);
    }

    public function searchAll(Request $request)
    {
        $search = $request->searchData;
        Session::put('ALL_SEARCH', $search); // create
        $sessionData = Session::get('ALL_SEARCH'); // get
        $responseData = Customer::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('gender', 'like', '%' . $search . '%')
            ->orWhere('age', 'like', '%' . $search . '%')
            ->get();

        return view('list')->with(['data' => $responseData, 'sessionData' => $sessionData]);
    }

    public function customSearch(Request $request)
    {
        $searchData = $this->searchDateRequest($request);

        if (isset($searchData['startDate']) && isset($searchData['endDate'])) {

            $validator = Validator::make($request->all(), [
                'endDate' => 'after:startDate',

            ],['endDate.after'=>'ရက် ကျော် နေ ပါ သည်။']);

            if ($validator->fails()) {
                return redirect()->route('list')
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        $queryData = $this->getQuery($searchData);

        $sessionData = Session::get('ALL_SEARCH');

        return view('list')->with(['data' => $queryData, 'sessionData' => $sessionData]);
    }

    private function getQuery($searchData)
    {
        $query = Customer::select('*');

        if (isset($searchData['name'])) {
            $query = $query->where('name', 'like', '%' . $searchData['name'] . '%');
        }
        if (isset($searchData['email'])) {
            $query = $query->where('email', 'like', '%' . $searchData['email'] . '%');
        }
        if (isset($searchData['address'])) {
            $query = $query->where('address', 'like', '%' . $searchData['address'] . '%');
        }
        if (isset($searchData['phone'])) {
            $query = $query->where('phone', 'like', '%' . $searchData['phone'] . '%');
        }
        if (isset($searchData['gender'])) {
            $query = $query->where('gender', $searchData['gender']);
        }
        if (isset($searchData['age'])) {
            $query = $query->where('age', $searchData['age']);
        }
        if (isset($searchData['startDate']) && isset($searchData['endDate'])) {
            $query = $query->where('created_at', '>=', $searchData['startDate'])
                ->where('created_at', '<=', $searchData['endDate']);
        }
        if (isset($searchData['startDate'])) {
            $query = $query->where('created_at', '>=', $searchData['startDate']);
        }
        if (isset($searchData['endDate'])) {
            $query = $query->where('created_at', '<=', $searchData['endDate']);
        }

        $query = $query->get();
        return $query;
    }

    private function searchDateRequest($request)
    {
        $search = [];

        if ($request->name != null) {
            $search['name'] = $request->name;
        }
        if ($request->email != null) {
            $search['email'] = $request->email;
        }
        if ($request->address != null) {
            $search['address'] = $request->address;
        }
        if ($request->phone != null) {
            $search['phone'] = $request->phone;
        }
        if ($request->gender != null) {
            $search['gender'] = $request->gender;
        }
        if ($request->age != null) {
            $search['age'] = $request->age;
        }
        if ($request->startDate != null) {
            $search['startDate'] = $request->startDate;
        }
        if ($request->endDate != null) {
            $search['endDate'] = $request->endDate;
        }

        return $search;
    }
}
