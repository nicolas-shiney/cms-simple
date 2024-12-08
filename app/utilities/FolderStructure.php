<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-08
 * Time: 18:21
 */

require_once 'ConsoleColor.php';

/**
 * Class FolderStructure
 * Handles the creation of directory structures based on a nested array configuration.
 */
class FolderStructure
{
private ConsoleColor $consoleColor;

    public function __construct()
    {
        $this->consoleColor = new ConsoleColor();
    }

    /**
     * Create a directory structure based on the provided array configuration.
     *
     * @param array $folders The directory structure to create.
     * @param string $basePath The base directory where the structure will be created. Defaults to the current directory.
     */
    public function create(array $folders, string $basePath = __DIR__): void
    {
        foreach ($folders as $folder) {
            $folderPath = $basePath . DIRECTORY_SEPARATOR . $folder['name'];

            // Create the folder if it doesn't exist
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
                // echo $this->consoleColor->colorText("Created folder: $folderPath", "green") . PHP_EOL;
                echo $this->consoleColor->colorText("Created folder: ", "white") . PHP_EOL;
                echo $this->consoleColor->colorText($folderPath, "green") . PHP_EOL;
            } else {
                echo $this->consoleColor->colorText("Folder already exists: $folderPath", "yellow") . PHP_EOL;
            }

            // Set writable permissions if specified
            if (isset($folder['writable']) && $folder['writable'] === true) {
                chmod($folderPath, 0777);
                echo $this->consoleColor->colorText("Set writable permissions on: $folderPath", "cyan") . PHP_EOL;
            }

            // Recursively create child folders
            if (!empty($folder['children'])) {
                $this->create($folder['children'], $folderPath);
            }
        }
    }
}
