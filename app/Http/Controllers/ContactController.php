<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function showForm()
    {
        return view('form.form');
    }

    
    public function submitForm(Request $request)
    {
        
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:500',
            'attachment'=> 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

           // Store uploaded file
    $path = $request->file('attachment')->store('uploads', 'public');
    $data['attachment'] = $path;
        
        session()->flash('success', 'Your message has been submitted successfully!');

        
        session(['contact_data' => $data]);

        
        return redirect()
        ->route('form.confirmation')
        ->cookie('file_uploaded', 'true', 60); // cookie valid for 60 mins
    }

    
    public function confirmation()
    {
        $data = session('contact_data');
        return view('form.confirmation', compact('data'));
    }
}
