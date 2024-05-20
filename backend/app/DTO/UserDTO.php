<?php

namespace App\DTO;

class UserDTO
{
    public readonly string $email;
    public readonly string $name;
    public readonly string $password;
    public readonly string $accountName;

    public readonly string $aboutUs;
    public readonly ?string $currentPosition;
    public readonly string $focusArea;
    public readonly string $managementArea;
    public readonly ?string $quantityEnterprise;
    public readonly ?string $quantityTeam;
    public readonly string $reason;

    public function __construct(
        $email,
        $name,
        $password,
        $accountName,
        $aboutUs,
        $currentPosition,
        $focusArea,
        $managementArea,
        $quantityEnterprise,
        $quantityTeam,
        $reason
    ){

        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->accountName = $accountName;

        $this->aboutUs = $aboutUs;
        $this->currentPosition = $currentPosition;
        $this->focusArea = $focusArea;
        $this->managementArea = $managementArea;
        $this->quantityEnterprise = $quantityEnterprise;
        $this->quantityTeam = $quantityTeam;
        $this->reason = $reason;

    }
}
