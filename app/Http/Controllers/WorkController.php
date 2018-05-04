<?php

namespace App\Http\Controllers;

use App\Work;
use App\Skill;
use Illuminate\Http\Request;

class WorkController extends Controller{
	public function index() {
		return view('works.index');

	}

	public function create() {

		$skills = Skill::all()->pluck('name');

		return view('works.create')->with(['skills' => $skills]);

	}

	public function store(Request $request) {

		$this->validate($request, [
			'title'         => 'required|string|max:255',
			'working_time'  => 'required|string',
			'content'       => 'required|string',
			'skill_level'   => 'required|integer|max:5|min:1',
			'contact_name'  => 'required|string',
			'contact_email' => 'nullable|string',
			'contact_phone' => 'nullable|string',
			'budget'        => 'nullable|string',
			'avatar'        => 'nullable',
			'start_at'      => 'nullable|date',
			'end_at'        => 'nullable|date',
			'people'        => 'required|integer|min:1'
		]);


		$work = new Work();
		$work->fill($request->all());
		$work->save();

		$skills = $request->input('skills');
		if($skills[0]) {
			$skills   = explode(',', $skills[0]);
			$skillsId = [];
			foreach($skills as $skill) {
				$s = Skill::where('name', $skill)->first();
				array_push($skillsId, $s->id);

			}

			// link skills to the work
			$work->skills()->sync($skillsId);
			$work->save();
		}

		\Session::flash('message', 'Offre ajoutée avec succès');
		\Session::flash('alert-class', 'success');

		return back();
	}

	public function delete(Request $request) {
		$work = Work::find($request->input('id'));

		try {
			$work->skills()->delete();
			$work->delete();
		} catch(\Exception $e) {
			\Session::flash('message', 'Offre non supprimée');
			\Session::flash('alert-class', 'error');

			return back();
		}

		\Session::flash('message', 'Offre supprimée');
		\Session::flash('alert-class', 'success');

		return back();
	}
}
