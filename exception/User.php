<?php


class User
{
    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var DateTime
     */
    private $birthDate;

    /**
     * @return DateTime
     */
    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param DateTime $birthDate
     * @return User
     */
    public function setBirthDate(DateTime $birthDate): User
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname(string $lastname): User
    {

        if(ctype_digit($lastname)) {
            //C'est une classe native de PHP qui hérite d'Exception
            throw new InvalidArgumentException("Le nom de ne doit pas être un nombre");
        }

        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname(string $firstname): User
    {
        if(ctype_digit($firstname)) {
            throw new Exception("Le prénom ne doit pas être un nombre");
        }

        $this->firstname = $firstname;
        return $this;
    }
}