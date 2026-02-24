<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;


class AuthController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        $params = $request->query();
        $showModal = false;
        return view('admin', compact('contacts', 'categories', 'params', 'showModal'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateFromSearch($request->date_from)->paginate(7);
        $categories = Category::all();
        $params = $request->query();
        $showModal = false;
        return view('admin', compact('contacts', 'categories', 'params', 'showModal'));
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $contact = Contact::with('category')->find($id);
        $contact->delete();
        return redirect('/admin');
    }

}
