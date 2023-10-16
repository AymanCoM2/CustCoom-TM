<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class starting extends Command
{

    protected $signature = 'app:starting';
    // php artisan app:starting

    protected $description = 'Command description';

    public function handle()
    {
        $adminUser = new User();
        $adminUser->name = 'admin';
        $adminUser->email = 'admin@admin.com';
        $adminUser->password = Hash::make('123');
        $adminUser->isSuperUser = 1;
        $adminUser->email_verified_at = now();
        $adminUser->save();
        // 3 ->Viewer , 2->Editor , 1->Admin

        $editorUser = new User();
        $editorUser->name = 'editor';
        $editorUser->email = 'aymancoom3@gmail.com';
        $editorUser->password = Hash::make('123');
        $editorUser->isSuperUser = 2;
        $editorUser->email_verified_at = now();
        $editorUser->save();



        $editorUser2 = new User();
        $editorUser2->name = 'editor';
        $editorUser2->email = 'editor2@editor.com';
        $editorUser2->password = Hash::make('123');
        $editorUser2->isSuperUser = 2;
        $editorUser2->email_verified_at = now();
        $editorUser2->save();



        $viewerUser = new User();
        $viewerUser->name = 'viewer';
        $viewerUser->email = 'viewer1@viewer.com';
        $viewerUser->password = Hash::make('123');
        $viewerUser->isSuperUser = 3;
        $viewerUser->email_verified_at = now();
        $viewerUser->save();


        $viewerUser2 = new User();
        $viewerUser2->name = 'viewer';
        $viewerUser2->email = 'viewer2@viewer.com';
        $viewerUser2->password = Hash::make('123');
        $viewerUser2->isSuperUser = 3;
        $viewerUser2->email_verified_at = now();
        $viewerUser2->save();
    }
}
