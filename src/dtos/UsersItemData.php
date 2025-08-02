<?php

namespace PDVMobi\dtos;

class UsersItemData extends BaseDTO
{
    public function __construct(
        public readonly ?string $UsersID,
        public readonly ?string $Name,
        public readonly ?string $EMail,
        public readonly ?string $Pass,
    ) {}
}
