<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sms_template;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('q', '');
        $customers = Customer::with(['user', 'modifiedUser'])
            ->when($query, function($queryBuilder) use ($query) {
                $queryBuilder->where(function ($subQuery) use ($query) {
                    $subQuery->where('size_no', $query)
                             ->orWhere('phone_no', $query)
                             ->orWhere('name', 'like', '%' . $query . '%');
                });
            })
            ->orderByDesc('id')
            ->limit($query ? 50 : 5)
            ->get(['id', 'name', 'phone_no', 'size_no', 'address', 'created_at', 'updated_at']);

        $smsTemplates = Sms_template::all();
        
        return view('customers.index', compact('customers', 'smsTemplates'));
    }

    public function sendSmsToAll(Request $request)
    {
        set_time_limit(0);

        $apiConfig = [
            'type' => 'xml',
            'id' => 'rchrajatailor',
            'pass' => 'pakistan123',
            'lang' => 'Urdu',
            'mask' => 'RajaTailors',
            'endpoint' => 'http://www.outreach.pk/api/sendsms.php/sendsms/url'
        ];

        if ($request->input('all_phone_no') === 'all') {
            $customers = Customer::all('phone_no');
            foreach ($customers as $customer) {
                $phoneNo = $customer->phone_no;
                if ($phoneNo) {
                    $to = "92{$phoneNo}";
                    $message = urlencode($request->input('message', ''));
                    $data = "id={$apiConfig['id']}&pass={$apiConfig['pass']}&msg={$message}&to={$to}&lang={$apiConfig['lang']}&mask={$apiConfig['mask']}&type={$apiConfig['type']}";

                    $response = Http::post($apiConfig['endpoint'], $data);
                    // Handle $response if needed
                }
            }
        }

        return redirect()->route('customers.index')->with('message', 'SMS sent to all customers.');
    }

    public function sendSMS(Request $request, $phoneNo)
    {
        $apiConfig = [
            'type' => 'xml',
            'id' => 'rchrajatailor',
            'pass' => 'pakistan123',
            'lang' => 'Urdu',
            'mask' => 'RajaTailors',
            'endpoint' => 'http://www.outreach.pk/api/sendsms.php/sendsms/url'
        ];

        if ($phoneNo === 'all') {
            $customers = Customer::all();
            return response()->json($customers);
        } else {
            $allPhoneNos = $request->input('all_phone_no', [$phoneNo]);
            $allSizeNos = $request->input('all_size_no', ['']);

            foreach ($allPhoneNos as $index => $phone) {
                $to = "92{$phone}";
                $message = urlencode($request->input('message') . ' (Size No: ' . ($allSizeNos[$index] ?? '') . ')');
                $data = "id={$apiConfig['id']}&pass={$apiConfig['pass']}&msg={$message}&to={$to}&lang={$apiConfig['lang']}&mask={$apiConfig['mask']}&type={$apiConfig['type']}";

                $response = Http::post($apiConfig['endpoint'], $data);
                // Handle $response if needed
            }
        }

        return redirect()->route('customers.index')->with('message', 'SMS sent to +92' . $phoneNo);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'phone_no' => 'required|string',
                'size_no' => 'nullable|string',
                'address' => 'nullable|string',
            ]);

            $data['created_user_id'] = Auth::id();
            $data['modified_user_id'] = Auth::id();

            if (Customer::create($data)) {
                return redirect()->route('customers.index')->with('success', 'Customer has been saved.');
            }

            return redirect()->route('customers.index')->with('error', 'Customer could not be saved. Please try again.');
        }

        return view('customers.add');
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Invalid Customer ID');
        }

        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted');
    }

    public function edit(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Invalid Customer');
        }

        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'phone_no' => 'required|string',
                'size_no' => 'nullable|string',
                'address' => 'nullable|string',
            ]);

            $data['modified_user_id'] = Auth::id();

            if ($customer->update($data)) {
                return redirect()->route('customers.index')->with('success', 'Customer has been saved.');
            }

            return redirect()->route('customers.index')->with('error', 'Customer could not be saved. Please try again.');
        }

        $smsTemplates = Sms_template::all();
        return view('customers.edit', compact('customer', 'smsTemplates'));
    }
}
