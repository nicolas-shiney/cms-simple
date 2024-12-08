<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-08
 * Time: 18:11
 */
//noinspection PhpUndefinedClassInspection

require_once 'vendor/autoload.php';

use League\CLImate\CLImate;

/**
 * Class MessageHandler
 * Provides methods to display styled messages in the console using CLImate.
 */
//noinspection PhpUndefinedClassInspection
class MessageHandler
{
    /**
     * @var CLImate The CLImate instance for styled output.
     */
    //noinspection PhpUndefinedClassInspection
    private CLImate $climate;

    /**
     * MessageHandler constructor.
     * Initializes the CLImate instance.
     */
    public function __construct()
    {
        $this->climate = new CLImate();
    }

    /**
     * Displays an informational message.
     *
     * @param string $message The message to display.
     */
    public function info(string $message): void
    {
        $this->climate->cyan()->out($message);
    }

    /**
     * Displays a success message.
     *
     * @param string $message The message to display.
     */
    public function success(string $message): void
    {
        $this->climate->green()->out($message);
    }

    /**
     * Displays a warning message.
     *
     * @param string $message The message to display.
     */
    public function warning(string $message): void
    {
        $this->climate->yellow()->out($message);
    }

    /**
     * Displays an error message.
     *
     * @param string $message The message to display.
     */
    public function error(string $message): void
    {
        $this->climate->red()->out($message);
    }

    /**
     * Displays a styled title.
     *
     * @param string $title The title to display.
     */
    public function title(string $title): void
    {
        $this->climate->bold()->white()->out($title);
    }
}
