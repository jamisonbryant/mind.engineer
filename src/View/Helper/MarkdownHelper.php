<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use League\CommonMark\CommonMarkConverter;

class MarkdownHelper extends Helper
{
    private ?CommonMarkConverter $converter = null;

    public function render(string $markdown): string
    {
        if ($this->converter === null) {
            $this->converter = new CommonMarkConverter([
                'html_input' => 'escape',
                'allow_unsafe_links' => false,
            ]);
        }

        return $this->converter->convert($markdown)->getContent();
    }
}
