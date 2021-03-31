# VAULT/Sharing
Setup social media sharing just by selecting which platforms you would like your website info to be shared.

# INSTALLATION and SETUP:

Create a packages folder in the root of your laravel project directory, followed by creating a vault directory:
~/packages/vault

Clone this repository into Grcaptcha directory as follows:
git clone https://github.com/gmlrie001/sharing.git sharing

Once done append to your projects main composer.json file with the following:
"repositories": [
  {
    "type": "path",
    "url": "packages/vault/sharing"
  }
}

Finally, run the following composer command to install the package:
composer require vault/sharing -o --profile -vvv

_OR_

{php_versioned} composer.phar require vault/sharing -o --profile -vvv

# USAGE:

  ### Client-side

  ### Server-side

