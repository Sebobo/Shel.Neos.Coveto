<?php

declare(strict_types=1);

namespace Shel\Neos\Coveto\Domain\Dto;

use Neos\Flow\Annotations as Flow;

/**
 * @Flow\Proxy(false)
 */
class JobDto implements \JsonSerializable
{
    protected string $title = '';
    protected string $text = '';
    protected string $html = '';
    protected string $id = '';
    protected string $mid = '';
    protected string $street = '';
    protected string $city = '';
    protected string $zip = '';
    protected string $region = '';
    protected string $country = '';
    protected string $category = '';
    protected ?JobContactDto $contact = null;
    protected string $link = '';
    protected string $apply = '';
    protected ?\DateTime $pubDate = null;
    protected string $jsonld = '';
    protected ?int $standort = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getHtml(): string
    {
        return $this->html;
    }

    public function setHtml(string $html): void
    {
        $this->html = $html;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getMid(): string
    {
        return $this->mid;
    }

    public function setMid(string $mid): void
    {
        $this->mid = $mid;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getContact(): ?JobContactDto
    {
        return $this->contact;
    }

    public function setContact(JobContactDto $contact): void
    {
        $this->contact = $contact;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getApply(): string
    {
        return $this->apply;
    }

    public function setApply(string $apply): void
    {
        $this->apply = $apply;
    }

    public function getPubDate(): ?\DateTime
    {
        return $this->pubDate;
    }

    public function setPubDate(\DateTime $pubDate): void
    {
        $this->pubDate = $pubDate;
    }

    public function getJsonld(): string
    {
        return $this->jsonld;
    }

    public function setJsonld(string $jsonld): void
    {
        $this->jsonld = $jsonld;
    }

    public function getLocationId(): ?int
    {
        return $this->standort;
    }

    public function setLocationId(?int $locationId): void
    {
        $this->standort = $locationId;
    }

    public static function fromArray(array $data = []): self
    {
        foreach (get_object_vars($obj = new self) as $property => $default) {
            if (!array_key_exists($property, $data)) {
                continue;
            }
            // Handle contact array separately
            $value = $data[$property];
            if ($value instanceof \SimpleXMLElement) {
                $value = (string)$value;
            }

            if ($property === 'contact') {
                $value = JobContactDto::fromArray((array)$value);
            } elseif ($property === 'pubDate') {
                $value = new \DateTime($value);
            } elseif ($property === 'standort') {
                $value = (int)$value;
            }
            $obj->{$property} = $value;
        }
        return $obj;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
