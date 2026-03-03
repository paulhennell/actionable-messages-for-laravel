<?php

namespace PaulHennell\ActionableMessages;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;
use JsonSerializable;
use Symfony\Component\Mime\Email;

class ActionableMailMessage extends MailMessage
{
    private ?JsonSerializable $adaptive_card = null;

    public function addAdaptiveCard(?JsonSerializable $adaptiveCard): self
    {
        if ($adaptiveCard === null) {
            return $this;
        }

        $this->adaptive_card = $adaptiveCard;

        $this->withSymfonyMessage(function (Email $message) {
            $message->html($this->injectScript($message->getHtmlBody()), $message->getHtmlCharset());
        });

        return $this;
    }

    /**
     * @return HtmlString|string
     */
    public function render()
    {
        return new HtmlString($this->injectScript(parent::render()));
    }

    private function injectScript(string $html): string
    {
        return str_replace('</head>', $this->getAdaptiveCard().'</head>', $html);
    }

    private function getAdaptiveCard(): string
    {
        if ($this->adaptive_card === null) {
            return '';
        }

        return '<script type="application/adaptivecard+json">'.json_encode($this->adaptive_card).'</script>';
    }
}
