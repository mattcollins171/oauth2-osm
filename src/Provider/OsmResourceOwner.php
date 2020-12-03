<?php

namespace mattcollins171\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class OsmResourceOwner implements ResourceOwnerInterface
{
    use ArrayAccessorTrait;

    /**
     * Raw response
     *
     * @var array
     */
    protected $response;

    /**
     * Creates new resource owner.
     *
     * @param array  $response
     */
    public function __construct(array $response = array())
    {
        $this->response = $response;
    }

    /**
     * Get resource owner id
     *
     * @return int|null
     */
    public function getId(): int
    {
        return $this->getValueByKey($this->response['data'], 'user_id');
    }

    /**
     * Get resource owner full name
     *
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->getValueByKey($this->response['data'], 'full_name');
    }

    /**
     * Get resource owner email
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->getValueByKey($this->response['data'], 'email');
    }

    /**
     * Get resource owner profile pic
     *
     * @return string|null
     */
    public function getProfilePicture(): ?string
    {
        return $this->getValueByKey($this->response['data'], 'profile_picture_url');
    }

    /**
     * Get resource owner scopes
     *
     * @return array
     */
    public function getScopes(): ?array
    {
        return $this->getValueByKey($this->response['data'], 'scopes');
    }

    /**
     * Get resource owner sections
     *
     * @return array|null
     */
    public function getSections(): ?string
    {
        return $this->getValueByKey($this->response['data'], 'sections');
    }

    /**
     * Return all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->response;
    }
}
