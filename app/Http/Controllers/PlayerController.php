<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlayerService;
use Validator;

class PlayerController extends Controller
{
    public function __construct(PlayerService $player)
    {
        $this->player = $player;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fields' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => snake_case($validator->errors()->first()),
            ], 400);
        }

        $fields = $request->get('fields');

        if ($fields) {
            $fields = explode(',', $fields);
        } else {
            $fields = [];
        }

        return [
            'status' => 'success',
            'results' => $this->player->get($fields)
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'string',
            'last_name' => 'string',
            'dob' => 'string|nullable',
            'height' => 'integer',
            'weight' => 'integer',
            'college_id' => 'integer|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => snake_case($validator->errors()->first()),
            ], 400);
        }

        $player = $this->player->create($request->all());

        return [
            'status' => 'success',
            'player' => $player,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $validator = Validator::make($request->all(), [
            'first_name' => 'string|nullable',
            'last_name' => 'string|nullable',
            'dob' => 'string|nullable',
            'height' => 'integer|nullable',
            'weight' => 'integer|nullable',
            'college_id' => 'integer|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => snake_case($validator->errors()->first()),
            ], 400);
        }

        $affectedRows = $this->player->update($id, $request->all());

        return [
            'status' => 'success',
            'affected_rows' => $affectedRows,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id < 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'id_required',
            ], 400);
        }

        $affectedRows = $this->player->delete($id);

        return [
            'status' => 'success',
            'affected_rows' => $affectedRows,
        ];
    }
}
