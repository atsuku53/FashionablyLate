<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3', 'address', 'building', 'category_id', 'detail']);
        return view('confirm', ['contact' => $contact]);
    }

    public function modify(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3', 'address', 'building', 'category_id', 'detail']);
        return view('index', ['contact' => $contact]);
    }

    public function store(ContactRequest $request)
    {
        $tel = $request->input('tel_1') . '-' . $request->input('tel_2') . '-' . $request->input('tel_3');
        $request->merge(['tel' => $tel]);
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $address = $request->input('address');
        $building = $request->input('building');
        $category_id = $request->input('category_id');
        $detail = $request->input('detail');
        Contact::create([
            'last_name' => $last_name,
            'first_name' => $first_name,
            'gender' => $gender,
            'email' => $email,
            'tel' => $tel,
            'address' => $address,
            'building' => $building,
            'category_id' => $category_id,
            'detail' => $detail,
        ]);
        return view('thanks');
    }

}