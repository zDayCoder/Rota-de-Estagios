<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacancy::all();
        return view(view: 'vacancy', data: compact('vacancies'));
        //return response()->json($vacancy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacancyCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required|integer',
            'name' => 'required|string|max:35',
            'description' => 'required|string|max:100',
            'salary' => 'required|numeric',
            'model' => 'required|in:presencial,hibrido,homeoffice',
            'addreess_id' => 'required|integer',
        ]);

        $vacancy = Vacancy::create($validatedData);
        return view('vacancy');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        return response()->json($vacancy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        $validatedData = $request->validate([
            'company_id' => 'required|integer',
            'name' => 'required|string|max:35',
            'description' => 'required|string|max:100',
            'salary' => 'required|numeric',
            'model' => 'required|in:presencial,hibrido,homeoffice',
            'addreess_id' => 'required|integer',
        ]);

        $vacancy->update($validatedData);
        return response()->json($vacancy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return response()->json(null, 204);
    }
}
