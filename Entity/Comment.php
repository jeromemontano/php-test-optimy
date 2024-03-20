<?php

class Comment
{
	public $id, $body, $createdAt, $newsId;

	/**
	 * Set the id field
	 *
	 * @param int $id
	 * @return self
	 */
	public function setId(int $id): self
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the id field
	 *
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * Set the body field
	 *
	 * @param string $body
	 * @return self
	 */
	public function setBody($body): self
	{
		$this->body = $body;

		return $this;
	}

	/**
	 * Get the body field
	 *
	 * @return string
	 */
	public function getBody(): string
	{
		return $this->body;
	}

	/**
	 * Set the createdAt field
	 *
	 * @param \DateTime $createdAt
	 * @return self
	 */
	public function setCreatedAt($createdAt): self
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * Get the createdAt field
	 *
	 * @return \DateTime
	 */
	public function getCreatedAt(): \DateTime
	{
		return $this->createdAt;
	}

	/**
	 * Get the news id field
	 *
	 * @return int
	 */
	public function getNewsId(): int
	{
		return $this->newsId;
	}

	/**
	 * Set the news id field
	 *
	 * @param int $newsId
	 * @return self
	 */
	public function setNewsId(int $newsId): self
	{
		$this->newsId = $newsId;

		return $this;
	}
}