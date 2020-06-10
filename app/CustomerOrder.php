<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    private int $bookingId;

    private string $firstName;

    private ?string $lastName;

    private \DateTime $departureDate;

    private \DateTime $returnDate;

    private int $destinationCountry;

    private ?int $destinationCity;

    /**
     * @return int
     */
    public function getBookingId(): int
    {
        return $this->bookingId;
    }

    /**
     * @param int $bookingId
     */
    public function setBookingId(int $bookingId): void
    {
        $this->bookingId = $bookingId;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return \DateTime
     */
    public function getDepartureDate(): \DateTime
    {
        return $this->departureDate;
    }

    /**
     * @param \DateTime $departureDate
     */
    public function setDepartureDate(\DateTime $departureDate): void
    {
        $this->departureDate = $departureDate;
    }

    /**
     * @return \DateTime
     */
    public function getReturnDate(): \DateTime
    {
        return $this->returnDate;
    }

    /**
     * @param \DateTime $returnDate
     */
    public function setReturnDate(\DateTime $returnDate): void
    {
        $this->returnDate = $returnDate;
    }

    /**
     * @return int
     */
    public function getDestinationCountry(): int
    {
        return $this->destinationCountry;
    }

    /**
     * @param int $destinationCountry
     */
    public function setDestinationCountry(int $destinationCountry): void
    {
        $this->destinationCountry = $destinationCountry;
    }

    /**
     * @return int|null
     */
    public function getDestinationCity(): ?int
    {
        return $this->destinationCity;
    }

    /**
     * @param int|null $destinationCity
     */
    public function setDestinationCity(?int $destinationCity): void
    {
        $this->destinationCity = $destinationCity;
    }

}
