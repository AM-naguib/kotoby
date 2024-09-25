<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy("id", "desc")->get();
        return view('dashboard.sections.index', compact('sections'));
    }

    public function store(Request $request)
    {

        $data = Validator::make($request->all(), [
            "name" => "required|unique:authors,name"
        ]);

        if ($data->fails()) {
            return response()->json([
                "message" => $data->errors()
            ], 422);
        }

        Section::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name)
        ]);

        return response()->json([
            "message" => "success"
        ], 200);

    }


    public function update(Request $request, Section $section)
    {

        $data = Validator::make($request->all(), [
            "name" => "required|unique:authors,name," . $section->id
        ]);

        if ($data->fails()) {
            return response()->json([
                "message" => $data->errors()
            ], 422);
        }

        $section->update([
            "name" => $request->name,
            "slug" => Str::slug($request->name)
        ]);

        return response()->json([
            "message" => "success"
        ], 200);

    }

    public function destroy(Section $section)
    {
        $section->delete();
        return response()->json([
            "message" => "success"
        ], 200);
    }
}
