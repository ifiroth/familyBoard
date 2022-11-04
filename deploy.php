<?php
namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'https://github.com/ifiroth/familyBoard');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('fraineux.fr')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/familyBoard');

// Hooks

after('deploy:failed', 'deploy:unlock');
