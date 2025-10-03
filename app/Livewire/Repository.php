<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Prism;
use Prism\Prism\ValueObjects\ProviderTool;
use Prism\Prism\ValueObjects\Media\Image;

#[Layout('components.layouts.app')]
class Repository extends Component
{
    public $response;
    public $response2;
    public function mount()
    {
        $pdfPath = public_path('ref.pdf');

        $test = Prism::text()
        ->using(Provider::Gemini, 'gemini-2.0-flash')
        ->withPrompt(
            'saya lupa clockin jdi bagaima saya settlekan issue ni kla saya lupa ?',
            [Image::fromLocalPath($pdfPath),
            ]
        )
        ->asText();


//         $test2 = Prism::text()
//         ->using(Provider::Gemini, 'gemini-2.0-flash')
//         ->withPrompt(
//             'apa tajuk kita tadi ya ?',
//         )
//         ->asText();

//  $this->response = $test->text;
         
//  $this->response2 = $test2->text;

    }
    public function render()
    {
        return view('livewire.repository');
    }
}
