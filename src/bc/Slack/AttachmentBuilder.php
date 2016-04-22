<?php


namespace bc\Slack;


class AttachmentBuilder {

    private $text;
    private $fallback;
    private $preText;
    private $color;
    private $authorName;
    private $authorLink;
    private $authorIcon;
    private $title;
    private $titleLink;
    private $fileds;
    private $imageUrl;
    private $thumbUrl;

    /**
     * @return array
     */
    public function build() {
        $attachment = [];

        if(is_null($this->fallback)) throw new \InvalidArgumentException("Fallback is reqiered");
        $attachment['fallback'] = $this->fallback;

        if(!is_null($this->preText)) $attachment['pretext'] = $this->preText;
        if(!is_null($this->text)) $attachment['text'] = $this->text;
        if(!is_null($this->color)) $attachment['color'] = $this->color;

        if(!is_null($this->authorName)) $attachment['author_name'] = $this->authorName;
        if(!is_null($this->authorLink)) $attachment['author_link'] = $this->authorLink;
        if(!is_null($this->authorIcon)) $attachment['author_icon'] = $this->authorIcon;

        if(!is_null($this->title)) $attachment['title'] = $this->title;
        if(!is_null($this->titleLink)) $attachment['title_link'] = $this->titleLink;

        if(count($this->fileds) > 0) $attachment['fields'] = $this->fileds;

        if(!is_null($this->imageUrl)) $attachment['image_url'] = $this->imageUrl;
        if(!is_null($this->thumbUrl)) $attachment['thumb_url'] = $this->thumbUrl;

        return $attachment;
    }

    /**
     * @param string $text
     *
     * @return AttachmentBuilder
     */
    public function setText($text) {
        $this->text = $text;

        return $this;
    }

    /**
     * @param string $preText
     *
     * @return AttachmentBuilder
     */
    public function setPreText($preText) {
        $this->preText = $preText;

        return $this;
    }

    /**
     * @param string $fallback
     *
     * @return AttachmentBuilder
     */
    public function setFallback($fallback) {
        $this->fallback = $fallback;

        return $this;
    }

    /**
     * @param string $color
     *
     * @return AttachmentBuilder
     */
    public function setColor($color) {
        $this->color = $color;

        return $this;
    }

    /**
     * @param string $authorName
     *
     * @return AttachmentBuilder
     */
    public function setAuthorName($authorName) {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * @param string $authorLink
     *
     * @return AttachmentBuilder
     */
    public function setAuthorLink($authorLink) {
        $this->authorLink = $authorLink;

        return $this;
    }

    /**
     * @param string $authorIcon
     *
     * @return AttachmentBuilder
     */
    public function setAuthorIcon($authorIcon) {
        $this->authorIcon = $authorIcon;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return AttachmentBuilder
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $titleLink
     *
     * @return AttachmentBuilder
     */
    public function setTitleLink($titleLink) {
        $this->titleLink = $titleLink;

        return $this;
    }

    /**
     * @param string $imageUrl
     *
     * @return AttachmentBuilder
     */
    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @param string $thumbUrl
     *
     * @return AttachmentBuilder
     */
    public function setThumbUrl($thumbUrl) {
        $this->thumbUrl = $thumbUrl;

        return $this;
    }

    /**
     * @param $title
     * @param $value
     * @param bool $short
     *
     * @return AttachmentBuilder
     */
    public function addFiled($title, $value, $short = true) {
        $filed = [
            'title' => $title,
            'value' => $value,
            'short' => $short
        ];
        if(!in_array($filed, $this->fileds)) {
            $this->fileds[] = $filed;
        }

        return $this;
    }

}