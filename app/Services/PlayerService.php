<?php

namespace App\Services;

use App\Models\Player;

class PlayerService {

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function get(array $fields = [])
    {
        $columns = $fields ?: '*';

        $players = $this->player->select($columns)->get()->toArray();

        return $players;
    }

    public function create($player)
    {
        $player = $this->player->create([
            'first_name' => $player['first_name'],
            'middle_name' => $player['middle_name'] ?? null,
            'last_name' => $player['last_name'],
            'dob' => $player['dob'] ?? null,
            'height' => $player['height'],
            'weight' => $player['weight'],
            'college_id' => $player['college_id'],
        ]);

        return $player;
    }

    public function update($id, $player)
    {
        $fields = [];

        $updatableFields = [
            'first_name',
            'middle_name',
            'last_name',
            'dob',
            'height',
            'weight',
            'college_id',
        ];

        foreach ($player as $key => $value) {
            if (in_array($key, $updatableFields)) {
                $fields[$key] = $value;
            }
        }

        $affectedRows = $this->player->where('id', $id)->update($fields);

        return $affectedRows;
    }

    public function delete($id)
    {
        $affectedRows = $this->player->destroy($id);

        return $affectedRows;
    }
}