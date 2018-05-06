<?php

namespace App\Http\Controllers;

use App\Work;
use App\Skill;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

		$data            = $request->all();
		$data['slug']    = str_slug($data['title']) . '-' . time();
		$data['user_id'] = Auth::id();

		$work = new Work();
		$work->fill($data);
		$work->save();


		$skills = $request->input('skills');
		if($skills[0]) {
			$skills   = explode(',', $skills[0]);
			$skillsId = [];
			foreach($skills as $skill) {
				$s = Skill::where('name', $skill)->first();
				if( ! $s) {
					$s       = new Skill();
					$s->name = ucfirst($skill);
					$s->save();
				}
				array_push($skillsId, $s->id);

			}
			// link skills to the work
			$work->skills()->sync($skillsId);
			$work->save();
		}

		\Session::flash('message', 'Offre ajoutée avec succès');
		\Session::flash('alert-class', 'success');

		return redirect()->route('works.index');
	}

	public function show(Request $request, string $slug) {

		try {
			$work = Work::where('slug', $slug)->firstOrFail();
		} catch(ModelNotFoundException $e) {
			\Session::flash('message', 'Offre non trouvée');
			\Session::flash('alert-class', 'error');

			return redirect()->route('works.index');
		}

		return view('works.show')->with(['work' => $work]);

	}

	public function edit(Request $request, string $slug) {
		try {
			$work = Work::where('slug', $slug)->firstOrFail();
		} catch(ModelNotFoundException $e) {
			\Session::flash('message', 'Offre non trouvée');
			\Session::flash('alert-class', 'error');

			return redirect()->route('works.index');
		}
		$skills = Skill::all()->pluck('name');

		$skillsDefault = $work->skills()->pluck('name');


		return view('works.edit')->with(['work' => $work, 'skills' => $skills, 'skillsDefault' => $skillsDefault]);
	}

	public function update(Request $request, string $slug) {

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

		$data = $request->all();

		try {
			$work = Work::where('slug', $slug)->firstOrFail();
		} catch(ModelNotFoundException $e) {
			\Session::flash('message', 'Offre non trouvée');
			\Session::flash('alert-class', 'error');

			return redirect()->route('works.index');
		}
		$work->fill($data);
		$work->save();


		$skills = $request->input('skills');
		if($skills[0]) {
			$skills   = explode(',', $skills[0]);
			$skillsId = [];
			foreach($skills as $skill) {
				$s = Skill::where('name', $skill)->first();
				if( ! $s) {
					$s       = new Skill();
					$s->name = ucfirst($skill);
					$s->save();
				}
				array_push($skillsId, $s->id);

			}
			// link skills to the work
			$work->skills()->sync($skillsId);
			$work->save();
		}

		\Session::flash('message', 'Offre mise à jour avec succès');
		\Session::flash('alert-class', 'success');

		return redirect()->route('works.index');
	}

	public function delete(Request $request, string $slug) {

		try {
			$work = Work::where('slug', $slug)->firstOrFail();
		} catch(ModelNotFoundException $e) {
			\Session::flash('message', 'Offre non trouvée');
			\Session::flash('alert-class', 'error');

			return redirect()->route('works.index');
		}
		if($work->user_id !== Auth::id() && ! Auth::user()->is_admin) {
			\Session::flash('message', 'Vous n\'avez pas les droits');
			\Session::flash('alert-class', 'error');
			return redirect()->route('works.index');
		}
		try {
			$work->skills()->detach();
			$work->delete();
		} catch(\Exception $e) {
			\Session::flash('message', 'Offre non supprimée');
			\Session::flash('alert-class', 'error');
			return redirect()->route('works.index');
		}
		\Session::flash('message', 'Offre supprimée');
		\Session::flash('alert-class', 'success');

		return redirect()->route('works.index');
	}
}
