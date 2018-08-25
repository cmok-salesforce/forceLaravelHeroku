<?php
// https://gist.github.com/mattlundstrom/3240722
if (!function_exists('readDirectory')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function readDirectory($directory_string, $current_directory_node)
    {
	// OPEN THE DIRECTORY, WHICH RETURNS A DIRECTORY HANDLE
        $directory_handle = opendir($directory_string);
        if ($directory_handle) {
			// GET FILES
            $files = scandir($directory_string);
            foreach ($files as $file_string) {
				// BUILD A FILE PATH FROM THE ORIG DIRECTORY + THE CURRENT FILE'S PATH
                $full_file_path = $directory_string . '/' . $file_string;
				// IS THIS A FILE?
                if (is_file($full_file_path)) {
						// ADD TO XML
                    $file = $current_directory_node->addChild('file');
                    $file->addAttribute('path', $full_file_path);

                }
				// IS THIS A DIRECTORY? && EXCLUDE THE CURRENT AND PARENT DIRECTORIES
                else if (is_dir($full_file_path) && $file_string != '..' && $file_string != '.') { 
						// ADD TO XML
                    $directory = $current_directory_node->addChild('directory');
                    $directory->addAttribute('path', $full_file_path);
						// REPEAT readDirectory() USING THIS FOLDER AS THE CURRENT XML DIRECTORY NODE
                    readDirectory($full_file_path, $directory);

                }
            }
			
			// NO MORE FILES? CLOSE THE DIRECTORY
            closedir($directory_handle);
        }
    }
}
