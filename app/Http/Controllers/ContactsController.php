<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules =  [
            'name' => ['required','string','min:3','max:100','not_regex:/([%\$#\*<>]+)/'],
            'email' => ['required','email','max:200'],
            'phone' => ['required','digits:11'],
            'complaint' => ['required','not_regex:/([%\$#\*<>]+)/'],
        ];

        $this->validate( $request, $rules );

        $contact = Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "body" => $request->complaint
        ]);

        if ($contact) {
            return redirect()->route('contacts.create')->withStatus('لقد تم إرسال الشكوي بنجاح بنجاح');
        } else {
            return redirect()->route('contacts.create')->withStatus("حدث خطأ ما , من فضلك أعد المحاولة");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
