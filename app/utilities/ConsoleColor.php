<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-08
 * Time: 17:10
 */

//namespace App\utilities;


/**
 * Class ConsoleColor
 * Provides methods to colorize text for console output using ANSI escape codes.
 */

class ConsoleColor
{
    /**
     * @var array<string, string> Map of color names to their ANSI escape codes.
     */
    private $colors = [
        'red' => "\033[31m",
        'green' => "\033[32m",
        'yellow' => "\033[33m",
        'blue' => "\033[34m",
        'magenta' => "\033[35m",
        'cyan' => "\033[36m",
        'white' => "\033[37m",
        'white_bold' => "\033[1;37m",
        'reset' => "\033[0m",
    ];

    /**
     * Returns the text wrapped in the specified color's ANSI escape code.
     *
     * @param string $text The text to colorize.
     * @param string $color The color name (e.g., 'red', 'green'). Defaults to 'reset' if the color is invalid.
     * @return string The colorized text.
     */
    public function colorText(string $text, string $color): string
    {
        $colorCode = $this->colors[$color] ?? $this->colors['reset'];
        return $colorCode . $text . $this->colors['reset'];
    }

    /**
     * Returns a list of available color names.
     *
     * @return array<int, string> List of color names supported by this class.
     */
    public function getAvailableColors(): array
    {
        return array_keys($this->colors);
    }
}
