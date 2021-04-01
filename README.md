# VAULT/INFO
Generic information pages, such as Terms and Conditions, Privacy Policy, etc., with admin CRUD ability.

# INSTALLATION and SETUP:

Create a packages folder in the root of your laravel project directory, followed by creating a vault directory:
~/packages/vault

Clone this repository into the ```info directory``` as follows:
git clone https://github.com/gmlrie001/info.git info

Once done append to your projects main composer.json file with the following:
"repositories": [
  {
    "type": "path",
    "url": "packages/vault/info"
  }
}

Finally, run the following composer command to install the package:
composer require vault/info -o --profile -vvv

_OR_

{php_versioned} composer.phar require vault/info -o --profile -vvv

# USAGE:

  ### Client-side

  ### Server-side

