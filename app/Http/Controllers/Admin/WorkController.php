<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Work;
use App\Skill;
use Illuminate\Http\Request;

class WorkController extends Controller{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.works');
	}

	public function store(Request $request) {
		$validations = [
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
		];
		$validator = Validator::make($request->all(), $validations);

		if($validator->fails()) {
			$messages = [
				'type'    => 'error',
				'message' => 'Veuillez vérifier les données de l\'offre'
			];
			return response()->json($messages, 404);
		}

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

		$messages = [
			'type'    => 'success',
			'message' => 'Offre ajoutée avec succès'
		];

		return response()->json($messages, 201);
	}

	public function update(Request $request, string $slug) {
		$validations = [
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
		];
		$validator = Validator::make($request->all(), $validations);

		if($validator->fails()) {
			$messages = [
				'type'    => 'error',
				'message' => 'Veuillez vérifier les données de l\'offre'
			];
			return response()->json($messages, 404);
		}

		try {
			$work = Work::where('slug', $slug)->firstOrFail();
		} catch(ModelNotFoundException $e) {
			$messages = [
				'type'    => 'success',
				'message' => 'Offre non trouvée'
			];
			return response()->json($messages, 200);
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


		$messages = [
			'type'    => 'success',
			'message' => 'Offre mise à jour avec succès'
		];

		return response()->json($messages, 200);
	}

	public function delete(Request $request, string $slug) {
		try {
			$work = Work::where('slug', $slug)->firstOrFail();
		} catch(ModelNotFoundException $e) {
			$messages = [
				'type'    => 'error',
				'message' => 'Offre non trouvée'
			];
			return response()->json($messages, 404);
		}
	
		try {
			$work->skills()->detach();
			$work->delete();
		} catch(\Exception $e) {
			$messages = [
				'type'    => 'error',
				'message' => 'Impossible de supprimer l\'offre'
			];
			return response()->json($messages, 401);
		}
		$messages = [
			'type'    => 'success',
			'message' => 'Skill mise à jour avec succès'
		];
		return response()->json($messages, 204);
	}
}