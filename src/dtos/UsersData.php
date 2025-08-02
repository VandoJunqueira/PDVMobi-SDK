<?php

namespace PDVMobi\dtos;

 
use Illuminate\Http\Request;

class UsersData extends BaseDTO
{
    /**
     * @param UsersItemData[] $users
     */
    public function __construct(
        public readonly array $users
    ) {}

    public static function fromArray(array $data): self
    {
        $users = [];

        if (isset($data[0]) && is_array($data[0])) {
            foreach ($data as $item) {
                $userDto = new UsersItemData(
                    UsersID: $item['UsersID'] ?? null,
                    Name: $item['Name'] ?? null,
                    EMail: $item['EMail'] ?? null,
                    Pass: $item['Pass'] ?? null,
                );
                $users[] = ['Users' => $userDto];
            }
        } else {
            $userDto = new UsersItemData(
                UsersID: $data['UsersID'] ?? null,
                Name: $data['Name'] ?? null,
                EMail: $data['EMail'] ?? null,
                Pass: $data['Pass'] ?? null,
            );
            $users[] = ['Users' => $userDto];
        }

        return new self(users: $users);
    }


    public static function fromRequest(Request $request): self
    {
        return self::fromArray($request->all());
    }
}
