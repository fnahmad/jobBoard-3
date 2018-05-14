<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\User;
use Illuminate\Http\Request;

use Validator;
class UserController extends Controller{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.users');
	}

	public function store(Request $request) {
		$validations = [
			'firstname' => 'required|string|max:255',
			'lastname'  => 'required|string|max:255',
			'email'     => 'required|unique:users|regex:/([a-z\-]+).([a-z\-]+)@hetic.net/i',
			'promo'     => 'string|max:4',
			'phone'     => 'nullable|string|max:255',
			'password'  => 'required|string|min:6|confirmed'
		];
		$validator = Validator::make($request->all(), $validations);

		if($validator->fails()) {
			$messages = [
				'type'    => 'error',
				'message' => 'Veuillez vérifier les données de l\'utilisateur'
			];
			return response()->json($messages, 404);
		}
		$data = $request->all();
		$user = User::create([
			'firstname'   => $data['firstname'],
			'lastname'    => $data['lastname'],
			'email'       => $data['email'],
			'promo'       => $data['promo'],
			'phone'       => $data['phone'],
			'password'    => Hash::make($data['password']),
			'email_token' => base64_encode($data['email']),
		]);
		Mail::to($user->email)->send(new EmailVerification($user));

		$messages = [
			'type'    => 'success',
			'message' => 'Utilisateur ajouté avec succès'
		];

		return response()->json($messages, 201);
	}

	public function update(Request $request, $id) {
		$validations = [
			'firstname' => 'required|string|max:255',
			'lastname'  => 'required|string|max:255',
			'email'     => 'required|unique:users',
			'promo'     => 'string|max:4',
			'phone'     => 'nullable|string|max:255',
		];
		$validator = Validator::make($request->all(), $validations);

		if($validator->fails()) {
			$messages = [
				'type'    => 'error',
				'message' => 'Veuillez vérifier les données de l\'utilisateur'
			];
			return response()->json($messages, 404);
		}

		try {
			$user = User::findOrFail($id);
		} catch(ModelNotFoundException $e) {
			$messages = [
				'type'    => 'success',
				'message' => 'Utilisateur non trouvée'
			];
			return response()->json($messages, 404);
		}
		$data = $request->all();
		$user->fill($data);
		$user->save();

		$messages = [
			'type'    => 'success',
			'message' => 'Utilisateur mis à jour avec succès'
		];

		return response()->json($messages, 200);
	}

	public function delete(Request $request, $id) {
		try {
			$user = User::findOrFail($id);
		} catch(ModelNotFoundException $e) {
			$messages = [
				'type'    => 'error',
				'message' => 'Utilisateur non trouvée'
			];
			return response()->json($messages, 404);
		}
		try {
			$user->worksParticipations()->detach();
			$worksOwners = $user->worksOwner()->get();
			foreach($worksOwners as $worksOwner) {
				$worksOwner->user_id = null;
				$worksOwner->save();
			}
			$user->delete();
		} catch(\Exception $e) {
			$messages = [
				'type'    => 'error',
				'message' => 'Impossible de supprimer l\'utilisateur',
				'error' => $e
			];
			return response()->json($messages, 401);
		}
		$messages = [
			'type'    => 'success',
			'message' => 'Utilisateur supprimé avec succès'
		];
		return response()->json($messages, 204);
	}
}