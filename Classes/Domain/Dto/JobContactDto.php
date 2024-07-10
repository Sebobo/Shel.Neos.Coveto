<?php

declare(strict_types=1);

namespace Shel\Neos\Coveto\Domain\Dto;

use Neos\Flow\Annotations as Flow;

/**
 * @Flow\Proxy(false)
 */
class JobContactDto
{
    protected string $company = '';
    protected string $position = '';
    protected string $salutation = '';
    protected string $firstname = '';
    protected string $lastname = '';
    protected string $strasse = '';
    protected string $plz = '';
    protected string $ort = '';
    protected string $countrycode = '';
    protected string $phone = '';
    protected string $email = '';

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    public function getSalutation(): string
    {
        return $this->salutation;
    }

    public function setSalutation(string $salutation): void
    {
        $this->salutation = $salutation;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getStrasse(): string
    {
        return $this->strasse;
    }

    public function setStrasse(string $strasse): void
    {
        $this->strasse = $strasse;
    }

    public function getPlz(): string
    {
        return $this->plz;
    }

    public function setPlz(string $plz): void
    {
        $this->plz = $plz;
    }

    public function getOrt(): string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): void
    {
        $this->ort = $ort;
    }

    public function getCountrycode(): string
    {
        return $this->countrycode;
    }

    public function setCountrycode(string $countrycode): void
    {
        $this->countrycode = $countrycode;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public static function fromArray(array $data = []): self
    {
        foreach (get_object_vars($obj = new self) as $property => $default) {
            if (!array_key_exists($property, $data)) {
                continue;
            }
            $value = $data[$property];
            if ($value instanceof \SimpleXMLElement) {
                $value = (string)$value;
            }
            $obj->{$property} = $value;
        }
        return $obj;
    }
}
