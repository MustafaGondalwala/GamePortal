<?php

namespace App\Http\Controllers;

use App\Models\QuestionAttatchment;
use App\Models\QuestionMaster;
use App\Models\Student;
use App\Models\StudentDetails;
use Illuminate\Http\Request;

class StudentRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.my-profile');
    }

    /**
     * Student's Questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('register.my_question');
    }

    /**
     * Storing Student Data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'whatsapp_number' => 'required|size:10',
            'university' => 'required',
            'degree' => 'required',
            'specialization' => 'required',
            'completion_year' => 'required',
        ]);

        if ($request->has('name')) {
            $instances = new Student();
            $instances->name = $request->name;
            $instances->save();
        }

        //  Store data in database
        $instance = new StudentDetails();
        $instance->whatsapp_number = $request->whatsapp_number;
        $instance->university = $request->university;
        $instance->degree = $request->degree;
        $instance->specialization = $request->specialization;
        $instance->completion_year = $request->completion_year;
        $instance->save();

        //return data
        return redirect()->route('my.question')
         ->with('msgClass', 'success')->with('message', 'Tutor Phase 1 Registration complete successfully !!');
    }

    /**
     * Student's New Questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function newQuestions()
    {
        return view('register.ask_question');
    }

    /**
     * Store Student New Questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeNewQuestions(Request $request)
    {
        $this->validate($request, [
            // 'subject_id' =>         'required',
            'title' => 'required',
            'is_attatchment' => 'required',
        ]);

        //  Store data in database
        $instance = new QuestionMaster();
        $instance->title = $request->title;

        if ($request->has('is_attatchment')) {
            $instance->is_attatchment = true;
        }

        //file save
        if ($request->has('is_attatchment')) {
            $filename = time().'-'.$request->file('is_attatchment')->getClientOriginalName();
            $filePath = ($request->file('is_attatchment')->storeAs('public/question_attatchment', $filename));
            $is_attatchment = asset('storage/app/public/question_attatchment/'.$filename);

            //saving file path details
            $instances = new QuestionAttatchment();
            $instances->file_url = $filePath;
            $instances->save();
        }

        $instance->save();

        //return data
        return redirect()->route('my.question')
         ->with('msgClass', 'success')->with('message', 'Your Question Saved successfully !!');
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
