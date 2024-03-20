<?php

class News
{
	public $id, $title, $body, $createdAt, $comment;
		
	/**
	 * Set the id of the news
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
	 * Get the id of the news
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the title of the news
	 *
	 * @param string $title
	 * @return self
	 */
	public function setTitle(string $title): self
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Get the title of the news
	 *
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * Set the body of the news
	 *
	 * @param string $body
	 * @return self
	 */
	public function setBody(string $body): self
	{
		$this->body = $body;

		return $this;
	}

	/**
	 * Get the body of the news
	 *
	 * @return string
	 */
	public function getBody(): string
	{
		return $this->body;
	}

	/**
	 * Set the created at date of the news
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
	 * Get the created at date of the news
	 *
	 * @return \DateTime
	 */
	public function getCreatedAt(): \DateTime
	{
		return $this->createdAt;
	}

	/**
	 * Add a comment to the news
	 *
	 * @param Comment
	 * @return self
	 */
	public function setComment(Comment $comment): self
	{
		$this->comment[] = $comment;

		return $this;
	}

	/**
	 * Get the comment of the news
	 *
	 * @return array<Comment>
	 */
	public function getComment(): ?array
	{
		return $this->comment;
	}
}