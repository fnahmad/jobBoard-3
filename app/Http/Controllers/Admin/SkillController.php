<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.skills');
	}

	public function store(Request $request) {
		$validations = [
			'name'         => 'required|string|max:255',
		];
		$validator = Validator::make($request->all(), $validations);

		if($validator->fails()) {
			$messages = [
				'type'    => 'error',
				'message' => 'Veuillez vérifier le name du skill'
			];
			return response()->json($messages, 404);
		}

		$s       = new Skill();
		$s->name = ucfirst($request->input('name'));
		$s->save();

		$messages = [
			'type'    => 'success',
			'message' => 'Skill ajoutée avec succès'
		];

		return response()->json($messages, 201);
	}

	public function update(Request $request, string $slug) {
		$validations = [
			'name'         => 'required|string|max:255',
		];
		$validator = Validator::make($request->all(), $validations);

		if($validator->fails()) {
			$messages = [
				'type'    => 'error',
				'message' => 'Veuillez vérifier le name du skill'
			];
			return response()->json($messages, 404);
		}

		try {
			$skill = Skill::where('slug', $slug)->firstOrFail();
		} catch(ModelNotFoundException $e) {
			$messages = [
				'type'    => 'danger',
				'message' => 'Skill introuvable'
			];

			return response()->json($messages, 404);
		}

		$skill->name = ucfirst($request->input('name'));
		$skill->save();

		$messages = [
			'type'    => 'success',
			'message' => 'Skill mise à jour avec succès'
		];

		return response()->json($messages, 200);
	}

	public function delete(Request $request, string $slug) {
		try {
			$skill = Skill::where('slug', $slug)->firstOrFail();
		} catch(ModelNotFoundException $e) {
			$messages = [
				'type'    => 'danger',
				'message' => 'Skill introuvable'
			];

			return response()->json($messages, 404);
		}
		$skill->delete();
		$messages = [
				'type'    => 'success',
				'message' => 'Skill supprimée avec succès'
			];

		return response()->json($messages, 204);
	}
}