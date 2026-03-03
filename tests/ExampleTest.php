<?php

it('can test', function () {
    expect(true)->toBeTrue();
});

it('can make an actionable email', function () {
    $mail = new \PaulHennell\ActionableMessages\ActionableMailMessage()
        ->addAdaptiveCard(new FakeAdaptiveCard);

    expect($mail)->toBeInstanceOf(\PaulHennell\ActionableMessages\ActionableMailMessage::class)
        ->toBeInstanceOf(\Illuminate\Notifications\Messages\MailMessage::class);
});

it('can add the script on rendering', function () {
    $html = new \PaulHennell\ActionableMessages\ActionableMailMessage()
        ->addAdaptiveCard(new FakeAdaptiveCard)
        ->render()->toHtml();
    expect($html)->toContain('<script type="application/adaptivecard+json">{"items":["text","image"]}</script></head>');
});

it('the callback is registered', function () {
    $html = new \PaulHennell\ActionableMessages\ActionableMailMessage()
        ->addAdaptiveCard(new FakeAdaptiveCard);

    expect($html->callbacks)->not->toBeEmpty();
});

class FakeAdaptiveCard implements JsonSerializable
{
    public function jsonSerialize(): mixed
    {
        return [
            'items' => ['text', 'image'],
        ];
    }
}
